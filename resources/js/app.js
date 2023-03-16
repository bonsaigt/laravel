/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";

import Vue from 'vue';
// import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
// import 'sweetalert2/dist/sweetalert2.min.css';

// Vue.use(VueSweetalert2);

// Vue.filter('fecha', value => moment(value).format('DD/MM/YYYY'))
// Vue.filter('fechaMysql0', value => moment(value).format('YYYY-MM-DD 00:00:00'))
// Vue.filter('fechaMysql23', value => moment(value).format('YYYY-MM-DD 23:59:59'))
// Vue.filter('fechaHora', value => moment(value).format('DD/MM/YYYY HH:mm'))
// Vue.filter('fechaHoraCorta', value => moment(value).format('DD/MM HH:mm'))

// import CatalogsRolesEdit from '../../vendor/csgt/utils/src/resources/views/catalogs/RolesEdit.vue';
// import CatalogsRolemodule from '../../vendor/csgt/utils/src/resources/views/catalogs/RoleModule.vue';
// import CatalogsUsersEdit from '../../vendor/csgt/utils/src/resources/views/catalogs/UsersEdit.vue';
// import Profile from '../../vendor/csgt/utils/src/resources/views/Profile.vue';
// import InputField from '../../vendor/csgt/utils/src/resources/components/InputField.vue';

// import Equipment from './views/Catalogs/Equipment.vue';

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

// Vue.component('catalogs-roles-edit', CatalogsRolesEdit);
// Vue.component('catalogs-rolemodule', CatalogsRolemodule);
// Vue.component('catalogs-users-edit', CatalogsUsersEdit);
// Vue.component('profile', Profile);
// Vue.component('InputField', InputField);

// Vue.component('Equipment', Equipment);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});
