$(document).ready(function () {
    const savedTheme = localStorage.getItem("theme");
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
        console.log(selectedID);
    });
    $("#dropdown-1").click(function () {
        console.log("COCK");
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
        console.log("cock");
    });
    $("#revenueDateFilter").click(function () {
        if ($("#revenueChoice").hasClass("active")) {
            $("#revenueChoice").removeClass("active");
        } else {
            $("#revenueChoice").addClass("active");
        }
        console.log("cock");
    });
    $("#userDateFilter").click(function () {
        if ($("#userChoice").hasClass("active")) {
            $("#userChoice").removeClass("active");
        } else {
            $("#userChoice").addClass("active");
        }
        console.log("cock");
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
            console.log("1212"); // Or remove the 'active' class
        }
    });
});
