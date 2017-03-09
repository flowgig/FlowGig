/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

import * as header from './modules/global/global';


document.addEventListener('DOMContentLoaded', function () {

    var mainContainer = document.getElementById('page') !== null ? document.getElementById('page') : false;
    if (mainContainer) {
        var body = require('./modules/global/body');
        console.log(body);
        mainContainer.innerHTML = body.default;
    }

    var headerContainer = document.getElementById('header')
    headerContainer.innerHTML = header.default;
    console.log(header);


    var dashboardContainer = document.getElementById('dashboard') !== null ? document.getElementById('dashboard') : false;
    if (dashboardContainer) {
        var dashboard = require('./modules/pages/dashboard');
        dashboardContainer.innerHTML = dashboard.default;
    }

}, false);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
 Vue.component('example', require('./components/Example.vue'));

 const app = new Vue({
 el: '#app'
 });

 */