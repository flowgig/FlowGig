/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

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
    $(document).on("click", ".list-item-buttons", function () {
        if ($(window).width() < 736) {
            $(this).parent("li").toggleClass("list-item-menu-active");
        }
    });
});
