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
                <div class="row mt-4">
                    <template v-for="(newIngredint , index) of ingredientsInProduct">
                        <div class="col-8">
                        <input :name="'ingredinets['+index+'][id]'" :value="getIdIngredient(newIngredint.value)" type="hidden"/>
                        <input :name="'ingredinets['+index+'][quantity]'" :value="newIngredint.quantity" type="hidden"/>
                        {{newIngredint.value}}
                        </div>
                        <div class="col-3">
                        {{newIngredint.quantity}}
                        </div>
                    </template>
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
            onFileChange(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
            },
            addIngredient(){
                let self = this;
                if(self.ingredient.value == ""  ||  self.ingredient.quantity == ""){
                    return
                }
                let  id = self.getIdIngredient(self.ingredient.value);
                var flag = false;
                let ingredients = this.parseJson(this.ingredients);
                let itemId = ingredients.find(element => element.id == id );
                if (itemId != undefined) {
                    self.ingredientsInProduct.push({...self.ingredient});
                    self.ingredient =  {
                        value: "",
                        quantity: ""
                    };
                }

            },
            getIdIngredient(text){

                let id = text.split(",").pop();

                return id.replace(" ", "");

            },
            getNameIngredient(ingredient){
                return ingredient.name +" " + ingredient.unit.value  +", "+ingredient.id;
            },
            parseJson(json){
                return JSON.parse(json);
            },
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
