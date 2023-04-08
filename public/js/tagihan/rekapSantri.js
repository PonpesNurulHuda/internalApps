$(document).on("click", ".icon", function () {
    console.log($(this));
    console.log($(this).html());

    if ($(this).find("i").hasClass("bi-box-arrow-in-down-right")) {
        $(this).find("i").removeClass("bi-box-arrow-in-down-right");
        $(this).find("i").addClass("bi-box-arrow-in-up-right");
    } else {
        $(this).find("i").addClass("bi-box-arrow-in-down-right");
        $(this).find("i").removeClass("bi-box-arrow-in-up-right");
    }
});