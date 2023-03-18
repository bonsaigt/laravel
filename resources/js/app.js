/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";

import Vue from 'vue';

Vue.filter('date', value => moment(value).format('DD/MM/YYYY'))
Vue.filter('datetime', value => moment(value).format('DD/MM/YYYY HH:mm'))
Vue.filter('number', (value, decimals) => accounting.formatNumber(value, decimals))

// Crud
import CrudIndex from '../../vendor/bonsai/crud/src/resources/js/views/CrudIndex.vue';
import CrudEdit from '../../vendor/bonsai/crud/src/resources/js/views/CrudEdit.vue';
import CrudHeader from '../../vendor/bonsai/crud/src/resources/js/components/CrudHeader.vue';
import CrudField from '../../vendor/bonsai/crud/src/resources/js/components/CrudField.vue';
import CrudColumn from '../../vendor/bonsai/crud/src/resources/js/components/CrudColumn.vue';
import CrudButton from '../../vendor/bonsai/crud/src/resources/js/components/CrudButton.vue';
import Cargando from '../../vendor/bonsai/crud/src/resources/js/components/Cargando.vue';

// app
import Home from './views/home/Index.vue';

window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context("./", true, /\.vue$/i);
// files
//     .keys()
//     .map((key) =>
//         Vue.component(key.split("/").pop().split(".")[0], files(key).default)re  
//     );

// crud
Vue.component('crud-index', CrudIndex);
Vue.component('crud-edit', CrudEdit);
Vue.component('crud-header', CrudHeader);
Vue.component('crud-field', CrudField);
Vue.component('crud-column', CrudColumn);
Vue.component('crud-button', CrudButton);
Vue.component('cargando', Cargando);

// app
Vue.component('home', Home);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});
