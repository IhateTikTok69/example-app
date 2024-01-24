@extends('admin.layout.main')
@section('contents')
<section id="trans" class="mt-5">
    <div class="card-2 w-fit p-0 rounded-md">
        <div class="flex button-list">
            <button href='allTrans' class="allTrans checker">All transcations</button>
            <button href='newTrans' class="newTrans checker">New transcations</button>
            <button href='readyToShip' class="readyToShip checker">Ready to Ship</button>
            <button href='inShipment' class="inShipment checker">In shipment</button>
            <button href='completed' class="completed checker">Completed transcations</button>
            <button href='canceled' class="canceled checker">Canceled</button>
        </div>
    </div>
    <div id="allTrans" class=" hidden identifier">
        <div id="allSalesData" class=" overflow-x-visible"></div>
    </div>
    <div id="newTrans" class="hidden identifier">
        <div id="newOrders" class=" overflow-x-visible"></div>
    </div>
    <div id="readyToShip" class=" hidden identifier">
        <div id="paidOrders" class=" overflow-x-visible"></div>
    </div>
    <div id="inShipment" class=" p-0 hidden identifier">
        <div id="inShipment" class=" overflow-x-visible"></div>
    </div>
    <div id="completed" class=" p-0 hidden identifier">
        <div id="completed" class=" overflow-x-visible"></div>
    </div>
    <div id="canceled" class=" p-0 hidden identifier">
        <div id="canceled" class=" overflow-x-visible"></div>
    </div>
</section>
<script>
    $(document).ready(function () {
        idk = '{{ csrf_token() }}';
        GetAllTransactions();
        GetNewTransactions();
        getPaidOrders();
        GetInShipment();
        GetCompleted()
        GetCanceled()
        function GetAllTransactions(page = 1){
            $.ajax({
                method: "POST",
                url: "{{ url('admin/transactions/GetAllTransactions') }}",
                data: {
                    _token : idk,
                    page: page,
                },
                success: function (data) {
                    $('#allSalesData').html(data);
                },
                error: function(error) {
                    console.log(error);
                     
                }
            });
        }
        $(document).on('click', '.pagination-all a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            GetAllTransactions(page); 
        });
        //=======
        function GetNewTransactions(page = 1){
            $.ajax({
                method: "POST",
                url: "{{ url('admin/transactions/GetNewTransactions') }}",
                data: {
                    _token : idk,
                    page: page,
                },
                success: function (data) {
                    $('#newOrders').html(data);
                },
                error: function(error) {
                    console.log(error);
                     
                }
            });
        }
        $(document).on('click', '.pagination-new a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            GetNewTransactions(page); 
        });
        //=======
        function getPaidOrders(page = 1){
            $.ajax({
                method: "POST",
                url: "{{ url('admin/transactions/getPaidOrders') }}",
                data: {
                    _token : idk,
                    page: page,
                },
                success: function (data) {
                    $('#paidOrders').html(data);
                },
                error: function(error) {
                    console.log(error);
                     
                }
            });
        }
        $(document).on('click', '.pagination-paid a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getPaidOrders(page); 
        });
        //=======
        function GetInShipment(page = 1){
            $.ajax({
                method: "POST",
                url: "{{ url('admin/transactions/GetInShipment') }}",
                data: {
                    _token : idk,
                    page: page,
                },
                success: function (data) {
                    $('#inShipment').html(data);
                },
                error: function(error) {
                    console.log(error);
                     
                }
            });
        }
        $(document).on('click', '.pagination-inShip a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            GetInShipment(page); 
        });
        //=======
        function GetCompleted(page = 1){
            $.ajax({
                method: "POST",
                url: "{{ url('admin/transactions/GetCompleted') }}",
                data: {
                    _token : idk,
                    page: page,
                },
                success: function (data) {
                    $('#completed').html(data);
                },
                error: function(error) {
                    console.log(error);
                     
                }
            });
        }
        $(document).on('click', '.pagination-completed a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            GetCompleted(page); 
        });
        //=======
        function GetCanceled(page = 1){
            $.ajax({
                method: "POST",
                url: "{{ url('admin/transactions/GetCanceled') }}",
                data: {
                    _token : idk,
                    page: page,
                },
                success: function (data) {
                    $('#canceled').html(data);
                },
                error: function(error) {
                    console.log(error);
                     
                }
            });
        }
        $(document).on('click', '.pagination-canceled a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            GetCanceled(page); 
        });
    });
</script>
@endsection