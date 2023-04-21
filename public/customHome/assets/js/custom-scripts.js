$(function() {
    $(".main-searchbar").css("display", "none");
});

function toggleSearch() {
    console.log("search");
    console.log($(".main-searchbar").css("display"));
    if ($(".main-searchbar").css("display") == "block") {
        $(".main-searchbar").css("display", "none");
    } else {
        $(".main-searchbar").css("display", "block");
        debugger;
    }
}

$(function() {
    $("#mySidebar").on("click", function(e) {
        e.stopPropagation();
    });
});
$("body,html").on("click", function(e) {
    e.stopPropagation();
    if ($("#mySidebar").css("width") == "350px") {
        closeNav();
    }
});