$(document).ready(function () {
    const savedTheme = localStorage.getItem("theme");
    $(".allTrans").addClass("selected-filter");
    $("#allTrans").removeClass("hidden");
    $(".allTrans").click(function () {
        if ($("#allTrans").hasClass("hidden")) {
            $(".checker").removeClass("selected-filter");
            $(".allTrans").addClass("selected-filter");
            $(".identifier").addClass("hidden");
            $("#allTrans").removeClass("hidden");
        }
    });
    $(".newTrans").click(function () {
        if ($("#newTrans").hasClass("hidden")) {
            $(".checker").removeClass("selected-filter");
            $(".newTrans").addClass("selected-filter");
            $(".identifier").addClass("hidden");
            $("#newTrans").removeClass("hidden");
        }
    });
    $(".readyToShip").click(function () {
        if ($("#readyToShip").hasClass("hidden")) {
            $(".checker").removeClass("selected-filter");
            $(".readyToShip").addClass("selected-filter");
            $(".identifier").addClass("hidden");
            $("#readyToShip").removeClass("hidden");
        }
    });
    $(".inShipment").click(function () {
        if ($("#inShipment").hasClass("hidden")) {
            $(".checker").removeClass("selected-filter");
            $(".inShipment").addClass("selected-filter");
            $(".identifier").addClass("hidden");
            $("#inShipment").removeClass("hidden");
        }
    });
    $(".completed").click(function () {
        if ($("#completed").hasClass("hidden")) {
            $(".checker").removeClass("selected-filter");
            $(".completed").addClass("selected-filter");
            $(".identifier").addClass("hidden");
            $("#completed").removeClass("hidden");
        }
    });
    $(".canceled").click(function () {
        if ($("#canceled").hasClass("hidden")) {
            $(".checker").removeClass("selected-filter");
            $(".canceled").addClass("selected-filter");
            $(".identifier").addClass("hidden");
            $("#canceled").removeClass("hidden");
        }
    });
    if (savedTheme) {
        applyTheme(savedTheme);
    }
    $(".choice").click(function () {
        let selectedID = $(this).attr("href");
        let active = "#" + selectedID;
        $(".content").removeClass("active");
        $(active).addClass("active");

        $(".choice").removeClass("selected");
        $(this).addClass("selected");
    });
    $("#dropdown-1").click(function () {
        if ($(".dropdown-user").hasClass("droped")) {
            $(".dropdown-user").removeClass("droped");
        } else {
            $(".dropdown-user").addClass("droped");
        }
    });
    $(".containers").click(function () {
        $(".dropdown-user").removeClass("droped");
    });
    $("#themeSelect").click(function () {
        const currentTheme = $("#darkmode").hasClass("dark") ? "dark" : "light";
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        applyTheme(newTheme);
        localStorage.setItem("theme", newTheme);
    });
    function applyTheme(theme) {
        $("#darkmode").toggleClass("dark", theme === "dark");
        $("#theme-link").attr(
            "href",
            theme === "dark" ? "dark-theme.css" : "light-theme.css"
        );
    }
    $("#salesDateFilter").click(function () {
        if ($("#salesChoice").hasClass("active")) {
            $("#salesChoice").removeClass("active");
        } else {
            $("#salesChoice").addClass("active");
        }
    });
    $("#revenueDateFilter").click(function () {
        if ($("#revenueChoice").hasClass("active")) {
            $("#revenueChoice").removeClass("active");
        } else {
            $("#revenueChoice").addClass("active");
        }
    });
    $("#userDateFilter").click(function () {
        if ($("#userChoice").hasClass("active")) {
            $("#userChoice").removeClass("active");
        } else {
            $("#userChoice").addClass("active");
        }
    });

    $(document).on("click", function (event) {
        var dropdown = $(".date-filter ");
        var dropdownContent = $(".dateFilterChoice");

        if (
            !dropdown.is(event.target) &&
            dropdown.has(event.target).length === 0
        ) {
            // Clicked outside the dropdown
            dropdownContent.removeClass("active");
        }
    });
});
