/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
import Vue from 'vue';
import * as quark from 'quark-gui';


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Single */
Vue.component('Gig', require('./components/single/Gig.vue'));
Vue.component('SetlistSong', require('./components/single/SetlistSong.vue'));
Vue.component('Song', require('./components/single/Song.vue'));
Vue.component('Invitation', require('./components/single/Invitation.vue'));


/* Lists */
Vue.component('BandMembers', require('./components/lists/BandMembers.vue'));
Vue.component('BandNavigation', require('./components/lists/BandNavigation.vue'));
Vue.component('Gigs', require('./components/lists/Gigs.vue'));
Vue.component('Setlist', require('./components/lists/Setlist.vue'));
Vue.component('Songs', require('./components/lists/Songs.vue'));
Vue.component('Invitations', require('./components/lists/Invitations.vue'));


/* Grid items */
Vue.component('BandCard', require('./components/grid-items/BandCard.vue'));


/* Modals */
Vue.component('CreateSetlist', require('./components/modals/CreateSetlist.vue'));


Vue.component('Breadcrumbs', require('./components/Breadcrumbs.vue'));
Vue.component('CustomButton', require('./components/CustomButton.vue'));
Vue.component('CustomButtonRow', require('./components/CustomButtonRow.vue'));
Vue.component('MainFooter', require('./components/MainFooter.vue'));
Vue.component('MainNavigation', require('./components/MainNavigation.vue'));
Vue.component('WelcomeScreen', require('./components/WelcomeScreen.vue'));

const app = new Vue({
    el: '#app'
});

quark.Init.default();