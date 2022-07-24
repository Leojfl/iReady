<template>
        <div class="row">
        <div class="col-12 ">
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="formFile"  @change="onFileChange" >
        </div>
            <img v-if="url" :src="url"  style="height: 150px;"/>
        </div>
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
                    <div class="form-floating">
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Ingrediente"
                        :v-mode="ingredient.value"
                        v-model="ingredient.value">
                        <label for="exampleDataList" >Ingredientes </label>
                        <datalist id="datalistOptions">
                        <template v-for="ingredient of parseJson(ingredients)">
                            <option  :value="getNameIngredient(ingredient)" ></option>
                        </template>
                        </datalist>
                    </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                        <input type="text" autocomplete="off" placeholder=" "
                        class="form-control "
                        name="quantity"
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
                    <template v-for="(newingredint , index) of ingredientsInProduct">
                        <div class="col-8">
                        <input :name="'ingredinets['+index+'][id]'" :value="getIdIngredient(newingredint)" type="hidden"/>
                        <input :name="'ingredinets['+index+'][quantity]'" :value="newingredint.quantity" type="hidden"/>
                        {{newingredint.value}}
                        </div>
                        <div class="col-3">
                        {{newingredint.quantity}}
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
            errors: { default: null},
            ingredients: {default: []},
            ingredientsInProductUpdate: {
                type: Array,
                default() {
                  return []
                }
            },
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
            },
            addIngredient(){
                if(this.ingredient.value == "" &&  this.ingredient.quantity == "" ){
                    return
                }
                this.ingredientsInProduct.push({...this.ingredient});
                this.ingredient =  {
                    value: "",
                    quantity: ""
                };
            },
            getNameIngredient(ingredient){
                return ingredient.name +" " + ingredient.unit  +", "+ingredient.id;
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
                ingredientsInProduct: this.ingredientsInProductUpdate
            }
        }
    }
</script>

<style scoped>

</style>
