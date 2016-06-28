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
