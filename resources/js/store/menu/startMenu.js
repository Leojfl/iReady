import Menu from "./Menu.vue";
import Vue from 'vue/dist/vue'

$(document).ready(function () {
    Vue.component('vue-menu', Menu);
    const app = new Vue({el: '#app'});
});
