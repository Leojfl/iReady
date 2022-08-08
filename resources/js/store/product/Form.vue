<template>
        <div class="row">
        <div class="col-12 ">
            <div class="mb-3">
                <label for="formFile" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="formFile" name="image_product"  @change="onFileChange" >
            </div>
            <img v-if="url" :src="url"  style="height: 150px;"/>
        </div>
            <div class="col-12 col-md-6  py-0 mt-3" v-html='createInput("Nombre","name", "name", this.product.name )'>
            </div>
            <div class="col-12 col-md-6  py-0 mt-3" v-html='createInput("Precio","price", "price", this.product.price )'>
            </div>
            <div class="col-12 py-0 mt-3" >
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="descrpcion" id="floatingTextarea" style="height: 100px"
                    :value="this.product.description"
                    ></textarea>
                    <label for="floatingTextarea">Descripción</label>
                </div>
            </div>
            <div class="col-3 text-start mt-4">
                    <div class="form-check ">
                        <input class="form-check-input"
                        type="checkbox"
                        id="flexCheckDefault"
                        name="show"
                        :value="true"
                        :model="this.product.active"
                        >
                        <label class="form-check-label" for="flexCheckDefault">
                        Activo
                        </label>
                    </div>
            </div>
            <div class="col-12 py-0 mt-3">
                <span><b><i>Ingredientes</i></b></span>
            </div>
            <div class="col-12 py-0 mt-3">
                <div class="row">
                    <div class="col-8">
                    <div class="form-floating">
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Ingrediente"
                        :v-mode="ingredient.value"
                        v-model="ingredient.value">
                        <label for="exampleDataList" >Ingredientes </label>
                        <datalist id="datalistOptions">
                        <template v-for="ingredient of ingredients">
                            <option  :value="getNameIngredient(ingredient)" ></option>
                        </template>
                        </datalist>
                    </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                        <input type="text" autocomplete="off" placeholder=" "
                        class="form-control "
                        id="quatity"
                        v-model="ingredient.quantity">
                        <label class=""
                        for=" ">Cantidad </label>
                        <div class="invalid-feedback">
                            textError
                        </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="d-flex h-100">
                            <i class="fas fa-plus align-self-center cursor-pointer" @click="addIngredient"></i>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <template v-for="(newIngredint , index) of ingredientsInProduct">
                        <div class="col-8">
                        <input :name="'ingredinets['+index+'][fk_id_material]'" :value="getIdIngredient(newIngredint.value)" type="hidden"/>
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
            productUpdate: { requerid: false},
            errors: { default: null},
            ingredients: {default: []},
            urlImage: {default: String},
            ingredientsInProductUpdate: {
                type: Array,
            },
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
                let itemId = this.ingredients.find(element => element.id == id );
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
        },
        data() {
            return {
                url: null,
                newIngredient: "",
                ingredient: {
                    value: "",
                    quantity: ""
                },
                ingredientsInProduct: [],
                product: {
                    name: "",
                    price: "",
                    description: "",
                    active: false
                }
            }
        },

        created() {

            if(this.ingredientsInProductUpdate && this.ingredientsInProductUpdate.length > 0){
                var self = this
                this.ingredientsInProductUpdate.forEach((ingredient, index, array) => {
                    var updateIngredient = {
                        value: "",
                        quantity: ""
                    };
                    updateIngredient.value = self.getNameIngredient(ingredient);
                    updateIngredient.quantity = ingredient.pivot.quantity;
                    self.ingredientsInProduct.push(updateIngredient);
                })
            }

            if (this.productUpdate && this.productUpdate != undefined) {
                this.product = {
                    name: this.productUpdate.name,
                    price: this.productUpdate.price,
                    description: this.productUpdate.description,
                    active: this.productUpdate.show == 1
                }
            }
        },
    }
</script>

<style scoped>

</style>
