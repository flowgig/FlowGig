/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: 'body'
});




$(document).ready(function () {
    $(".list-clickable li").click(function () {
        $(this).addClass("list-item-clicked").delay(1000).queue(function () {
            $(this).removeClass("list-item-clicked").dequeue();
        });
    });
    $(".modal-hover-add-button").click(function () {
        $(this).closest("li").addClass("list-item-clicked").delay(1000).queue(function () {
            $(this).removeClass("list-item-clicked").dequeue();
        });
    });
    $(".list-item-buttons").click(function () {
        if ($(window).width() < 736) {
            $(this).parent("li").toggleClass("list-item-menu-active");
        }
    });
});
