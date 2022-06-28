import Form from "./Form";
import Vue from 'vue/dist/vue'

$(document).ready(function () {
    Vue.component('vue-form', Form);
    const app = new Vue({el: '#app'});
});
