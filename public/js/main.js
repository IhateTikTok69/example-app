$(document).ready(function () {
    var apiRout1 = routeUrls.route1;
    var apiRout2 = routeUrls.route2;
    var apiRout3 = routeUrls.route3;
    getSales();
    getRevenue();
    getRegister();

    function getSales(salesDate = "Today") {
        $.ajax({
            url: apiRout1,
            method: "POST",
            data: {
                dateFIlter: salesDate,
            },
            headers: {
                "X-CSRF-TOKEN": _token,
            },
            success: function (data) {
                $("#salesData").html(data);
                var jsonData = JSON.stringify(data);
                $(".salesIndicator").html(salesDate);
            },
            error: function (error) {
                console.log(error);
                // alert("Sales Data Request Failed");
            },
        });
    }
    $(".salesDataSelector").click(function () {
        salesDate = $(this).val();
        getSales(salesDate);
    });

    function getRevenue(revData = "Today") {
        $.ajax({
            url: apiRout2,
            method: "POST",
            data: {
                dateFIlter: revData,
            },
            headers: {
                "X-CSRF-TOKEN": _token,
            },
            success: function (data) {
                $("#revData").html(data);
                $(".revIndicator").html(revData);
            },
            error: function (error) {
                console.log(error);
                // alert("Sales Data Request Failed");
            },
        });
    }
    $(".revDataSelector").click(function () {
        revData = $(this).val();
        getRevenue(revData);
    });

    function getRegister(userData = "Today") {
        $.ajax({
            url: apiRout3,
            method: "POST",
            data: {
                dateFIlter: userData,
            },
            headers: {
                "X-CSRF-TOKEN": _token,
            },
            success: function (data) {
                $("#userData").html(data);
                $(".userIndicator").html(userData);
            },
            error: function (error) {
                console.log(error);
                // alert("Sales Data Request Failed");
            },
        });
    }
    $(".userDataSelector").click(function () {
        userData = $(this).val();
        getRegister(userData);
    });
});
