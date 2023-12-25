$(document).ready(function () {
    getSales();
    getRevenue();
    getRegister();

    function getSales(salesDate = "today") {
        $.ajax({
            url: "{{ route('dashboard.getSales') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                dateFIlter: salesDate,
            },
            success: function (data) {
                $("#salesData").html(data);
            },
            error: function (error) {
                console.log(error);
                alert("Sales Data Request Failed");
            },
        });
    }
    function getRevenue(revenueDate = "today") {
        $.ajax({
            url: "{{ url('admin/dashboard/getRevenue') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                dateFIlter: revenueDate,
            },
            success: function (data) {
                $("#revenueData").html(data);
            },
            error: function (error) {
                console.log(error);
                alert("Revenue Data Request Failed");
            },
        });
    }
    function getRegister(registerDate = "today") {
        $.ajax({
            url: "{{ url('admin/dashboard/getRegister') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                dateFIlter: registerDate,
            },
            success: function (data) {
                $("#registerData").html(data);
            },
            error: function (error) {
                console.log(error);
                alert("User Rgistration Data Request Failed");
            },
        });
    }
});
