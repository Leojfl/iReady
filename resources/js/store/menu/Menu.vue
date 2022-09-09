<template>
    <div class="row" >
        <div class="col-12" v-if="!isLoading">
            <div class="row text-start mt-4">
                <div class="col-md-12 border-bottom pb-4 text-center">
                    <span class="cursor-pointer"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-update"
                    @click="isShowProduct=false"
                    >
                        Agregar categoria <i class="fas fa-plus-circle color-primary" ></i>
                    </span>
                </div>

                <div v-if="categories.length == 0" class="col-md-12 mt-4 text-center" >
                    <i>Sin categorias</i>
                </div>

                <div class="col-md-11 mx-auto border-bottom" v-for="(category, categoryIndex) in categories">
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>{{category.name}} <i class="fas fa-trash cursor-pointer ms-4 color-primary" @click="removeCategory(categoryIndex)"></i></h5>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">

                                <input type="hidden"
                                    :name="'categories['+category.id+'][id]'"
                                    :value="category.id"
                                    />
                                <input type="text" autocomplete="off" placeholder=" "
                                    :name="'categories['+category.id+'][alias]'"
                                    v-model="category.alias"
                                    class="form-control"/>
                                <label class="">Alias</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <span type="button" class="cursor-pointer mb-4" style="font-size: 15px"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-update"
                                @click="selectCalegorie(category)">
                                Agregar producto <i class="fas fa-plus-circle color-primary" ></i>
                        </span>
                        </div>
                        <div class="mt-4 ms-4 border-bottom" v-if="(category.products == null || category.products == undefined ) || category.products.length == 0">
                            <i>Sin productos</i>
                        </div>
                        <div v-else class="col-12 border-bottom">
                            <div class="row">
                                <div class="col-md-10 mx-auto " v-for="(product, productIndex) in category.products">
                                    <div class="row border-bottom">
                                        <div class="col-3 p-0">
                                            <img class="w-100" :src="product.absolute_image_url" />
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <input type="hidden" :name="'categories['+category.id+'][products]['+productIndex+'][producutId]'" :value="product.id"/>
                                                <div class="col-12">
                                                    <h6>{{product.name}}</h6>
                                                </div>
                                                <div class="col-12">
                                                    <b>Precio:</b> {{product.price}}
                                                </div>

                                                <div class="col-12">
                                                    <h6>{{product.description}}</h6>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <i class="fas fa-trash cursor-pointer color-primary" @click="removeProduct(category, productIndex)"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-4 m-4 text-center">
                    <span class="btn btn-primary" @click="submitForm()">
                        Guardar
                    </span>
                </div>


                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                            <h5 class="modal-title" id="exampleModalLabel" v-if="isShowProduct">Selecciona un producto</h5>
                            <h5 class="modal-title" id="exampleModalLabel" v-else>Selecciona un categoria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-11 mx-auto">
                                        <div class="form-floating">
                                            <input type="text" autocomplete="off" placeholder=" "
                                            class="form-control"
                                            v-model="textAutoComplete"/>
                                            <label class="">Buscar</label>
                                        </div>
                                    </div>
                                    <template v-if="isShowProduct">
                                        <div class="col-md-12" v-for="product in filterProducts(textAutoComplete)">
                                            <div class="row m-4 " @click="addProduct(product)" data-bs-dismiss="modal" aria-label="Close" >
                                                <div class="col-3 p-0">
                                                    <img class="w-100" :src="product.absolute_image_url" />
                                                </div>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h6>{{product.name}}</h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <b>Precio:</b> {{product.price}}
                                                        </div>

                                                        <div class="col-12">
                                                            <h6>{{product.description}}</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template  v-else >
                                        <div class="col-md-12 " v-for="category in filterCategories(textAutoComplete)">
                                            <h6 @click="addCategory(category)" class="cursor-pointer mt-4 ms-4" data-bs-dismiss="modal" aria-label="Close" >
                                                {{category.name}}
                                            </h6>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" v-else >
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>
    </div>
</template>

<script>
export  default {
    props: {
        redirecTo: String,
        url: String,
        categoriesInMenu: { default: null },
        allCategories: { default: Array  },
        allProducts: { default: Array  },
    },
    methods: {
        selectCalegorie(category){
            this.categorySelected = category;
            this.isShowProduct=true;
        },
        filterProducts(text){
            var products = [];
            if (text == "") {
                return this.allProducts;
            }
            this.allProducts.forEach((product, index, array) => {
                if(product.name.toUpperCase().includes(text.toUpperCase())){
                    products.push(product);
                }
            });
            return products;
        },
        filterCategories(text){
            var categorires = Array();

            if (text== "") {
                return this.allCategories;
            }

            this.allCategories.forEach((category, index, array) => {
                if(category.name.toUpperCase().includes(text.toUpperCase())){
                    categorires.push(category);
                }
            });
            return categorires;
        },
        removeCategory(categoryIndex){
            showConfimGenericAlert("¿Estas seguro?", "Se borrara la categoria del menu así como los productos", () => {
                this.categories.splice(categoryIndex, 1);
            });
        },
        addCategory(category){
            this.categories.push({...category});
        },
        removeProduct(categorySelected, productIndex){
            showConfimGenericAlert("¿Estas seguro?", "El producto se borrara del menu", () => {
                var categories = []
                this.categories.forEach((category, index, array) => {
                    if(category.id == categorySelected.id){
                        category.products.splice(productIndex, 1);
                    }
                    categories.push(category);
                });
                this.categories = categories;

            });
        },
        addProduct(product){
            var categories = []
            this.categories.forEach((category, index, array) => {
                if(category.id == this.categorySelected.id){
                    if (category.products == null || category.products == undefined){
                        category.products = []
                    }
                    category.products.push({...product})
                }
                categories.push(category);
            });
            this.categories = categories;
        },
        submitForm(){
            this.isLoading = true;
            var data = new FormData($("#form-update")[0]);
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
            isLoading: false,
            textAutoComplete: "",
            isShowProduct: true,
            categories: [],
            categorySelected: null
        }
    },

    mounted() {
        console.log(this.categoriesInMenu);
        this.categoriesInMenu.forEach((category, index, array) => {
            category.category.alias = category.alias
            category.category.products = category.products
            this.categories.push(category.category);
        });

    },
}
</script>

<style scoped>

</style>
