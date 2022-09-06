<template>
    <div class="row" >
        <div class="col-12 text-end mt-4" v-if="!isLoading">
            <div type="button" class="btn btn-primary" @click="isShow=!isShow" v-if="!isShow">
                    Editar Mapa
            </div>
            <button type="button" class="btn btn-primary" @click="submitMap()" v-else>
                    Guardar
            </button>
        </div>
        <div class="col-12" v-if="isLoading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>
        <div class="col-12" >
            <div class="row">
                <div class="col-md-6 text-start mt-4 " v-if="isShow">
                    <div class="row">
                        <div class="col-12">
                            <h6>Control de eje x</h6>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary" @click="maxX++">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-primary" @click="maxX--">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-start mt-4" v-if="isShow">
                    <div class="row">
                        <div class="col-12">
                            <h6>Control de eje y</h6>
                        </div>
                        <div class="col-6 ">

                            <button type="button" class="btn btn-primary" @click="maxY++">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-primary" @click="maxY--">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4 ">
                    <form id="form-data">
                        <input type="hidden" name="_token" :value="csrf" />
                        <table class="table table-bordered ">
                        <thead>
                        </thead>
                        <tbody>
                        <tr v-for="y in maxY">
                            <th v-for="x in maxX">
                                <template v-if=" getBoard(x,y) != null &&  getBoard(x,y) != undefined">
                                    {{ getBoard(x,y).name}}
                                    <input type="hidden" :name="'positions['+getIndexBoard(x,y)+'][x]'" :value=" getBoard(x,y).position.x"/>
                                    <input type="hidden" :name="'positions['+getIndexBoard(x,y)+'][y]'" :value=" getBoard(x,y).position.y"/>
                                    <input type="hidden" :name="'positions['+getIndexBoard(x,y)+'][id]'" :value=" getBoard(x,y).id"/>
                                    <input type="hidden" name="" value=""/><br/>
                                    <i v-if="isShow" class="fas fa-trash text-danger cursor-pointer" @click="deleteBoard(x, y)"></i>
                                </template>

                                <template v-else>
                                    <i v-if="isShow" class="fas fa-plus-circle text-info cursor-pointer"
                                    @click="selectXandY(x, y)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-update"></i>
                                    <i v-else>   &nbsp;</i>

                                </template>
                            </th>
                        </tr>
                        </tbody>
                        </table>
                    </form>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecciona la mesa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mt-4" v-for="board in boards">

                                    <div class="card cursor-pointer" @click="addBoard(board)" data-bs-dismiss="modal" aria-label="Close">
                                        <div class="row p-4">
                                            <div class="col-12 border-bottom">
                                                <h6>{{board.name}}</h6>
                                            </div>
                                            <div class="col-12">
                                                {{board.description}}
                                            </div>
                                            <div class="col-12 text-success" v-if="getBoardInMap(board) != null && getBoardInMap(board) != undefined ">
                                                <i>En mapa</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export  default {
    props: {
        boards: {default: []},
        url: String,
        csrf: String
    },
    methods: {
        getIndexBoard(x, y){
            var indexPosition = -1;
            this.positions.forEach((item, index, array) => {
                if (item.position.x == x && item.position.y == y){
                    indexPosition = index;
                }
            });
            return indexPosition;
        },
        deleteBoard(x, y){
            var indexPosition = this.getIndexBoard(x,y);
            if (indexPosition != -1){
                this.positions.splice(indexPosition, 1);
            }
        },
        getBoard(x, y){
            return this.positions.find(item => {
                return item.position != null && item.position.x == x && item.position.y == y
            });
        },
        getBoardInMap(board){
            return this.positions.find(item => item.id == board.id );
        },
        addBoard(board){
            if(board.position != null){
                this.deleteBoard(board.position.x, board.position.y)
            }
            board.position = {
                x: this.x,
                y: this.y
            }
            this.positions.push({...board});
        },
        selectXandY(x, y){
            this.x = x;
            this.y = y;
        },
        submitMap(){
            if (this.positions.length == 0){
                window.showErrorAlert("Aviso", "Se requiere de almenos una mesa en el mapa");
                return
            }
            this.isShow = !this.isShow;
            this.isLoading = true;
            var data = new FormData($("#form-data")[0]);
            var formAjax = $.ajax({
                method: "POST",
                url: this.url,
                data: data,
                processData: false,
                contentType: false
            })
            var self = this;
            formAjax.done(function (response) {
                self.isLoading = false;
                if (response.success) {
                    self.isShow = false;
                    window.showSuccessAlert("Correcto", "Se guardo la información correctamente");
                }else{
                    self.isShow = true;
                    window.showErrorAlert("Error", "Por el momento no se puede aguardar la información, intente más tarde");
                }
            });

            formAjax.fail(function (jqXHR, textStatus) {
                window.showErrorAlert("Error", "Por el momento no se puede aguardar la información, intente más tarde");
                self.isLoading = false;
                self.isShow = true;
            });
        }
    },
    data() {
        return {
            isShow: false,
            isLoading: false,
            x: 0,
            y: 0,
            maxX: 0,
            maxY: 0,
            positions: []
        }
    },

    mounted() {
        if(this.boards.length > 0) {
            this.boards.forEach((board, index, array) => {
                if (board.position == null) {
                    return
                }
                this.positions.push({...board});
                if (this.maxX < board.position.x){
                    this.maxX = board.position.x * 1;
                }
                if (this.maxY < board.position.y){
                    this.maxY = board.position.y * 1 ;
                }
            });
        }
        this.maxX++;
        this.maxY++;
    },
}
</script>

<style scoped>

</style>
