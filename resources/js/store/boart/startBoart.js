import Form from "./BoartIndex.vue";
import Vue from 'vue/dist/vue'

$(document).ready(function () {
    Vue.component('vue-boart', Form);
    const app = new Vue({el: '#app'});
});
