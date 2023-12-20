$(document).ready(function () {
    $(".choice").click(function () {
        let selectedID = $(this).attr("href");
        let active = "#" + selectedID;
        $(".content").removeClass("active");
        $(active).addClass("active");

        $(".choice").removeClass("selected");
        $(this).addClass("selected");

        console.log(selectedID);
    });
});
