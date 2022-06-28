<template>
        <div class="row">
            <div class="col-12 col-md-6  py-0 mt-3" v-html='createInput("Nombre","name", "name", "")'>
            </div>
            <div class="col-12 col-md-6  py-0 mt-3" v-html='createInput("Precio","price", "price", "")'>
            </div>
            <div class="col-12 py-0 mt-3" >
                <div class="form-floating">
                    <textarea class="form-control" placeholder="descrpcion" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">Descripción</label>
                </div>
            </div>
            <div class="col-12 py-0 mt-3">
                <span><b><i>Ingredientes</i></b></span>
            </div>
            <div class="col-12 py-0 mt-3">
                <div class="row">
                    <div class="col-8">
                    8
                    </div>
                    <div class="col-3">
                    8
                    </div>
                    <div class="col-1">
                    8
                    </div>
                </div>
            </div>

        </div>
</template>

<script>
    export default {
        props: {
            isNew: { type: String },
            product: { requerid: false},
            errors: { default: null}
        },
        methods: {
            createInput(label,id, name, value) {
                var textError = "";
                if (this.errors != null && this.errors[name] != null)  {
                    textError = this.errors[name]
                }
                return '<div class="form-floating">'+
                    '<input type="text" autocomplete="off" placeholder=" "'+
                    ' class="form-control '+(textError!=""?'is-invalid':'  ')+'"' +
                    ' name="'+name+'"'+
                    ' id="'+id+'"'+
                    ' value="'+value+'">'+
                    ' <label class="" '+
                    ' for="'+id+'"">'+label+'</label><div class="invalid-feedback">' +
                        textError  +
                     '</div>'
            }
        }
    }
</script>

<style scoped>

</style>
