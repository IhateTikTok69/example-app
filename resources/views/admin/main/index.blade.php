@extends('admin.layout.main')

@section('contents')
<section id="dashboard" class="content active">
    <h1 class="text-2xl font-semibold text-blue-600">Dashboard</h1>
    <p class="cursor-default">Home / Dashboard</p>
    <div class="seperator">
      <div class="main-cards">
        <div class="highlight-1">
          <div class="card-1 dark:bg-slate-800 dark:text-white relative">
            <div id="salesChoice" class="dateFilterChoice absolute right-0 mt-5 mr-2">
              <b  class=" text-slate-400">FILTER</b><br>
              <input type="button" value="Today"><br>
              <input type="button" value="This Week"><br>
              <input type="button" value="This Month"><br>
            </div>
            <button id="salesDateFilter" class="date-filter absolute right-0"><i class="bi bi-three-dots"></i></button>
            <p> Sales | <i class=" text-slate-400">Today</i> </p> 
            <div id="salesData">  </div>
          </div>
          <div class="card-1 dark:bg-slate-800 dark:text-white relative">
            <div id="revenueChoice" class="dateFilterChoice absolute right-0 mt-5 mr-2">
              <b  class=" text-slate-400">FILTER</b><br>
              <input type="button" value="Today"><br>
              <input type="button" value="This Week"><br>
              <input type="button" value="This Month"><br>
            </div>
            <button id="revenueDateFilter" class="date-filter absolute right-0"><i class="bi bi-three-dots"></i></button>
            <p>Revenue | <i class=" text-slate-400">Today</i></p>
            <p> ${{number_format($revenue)}} </p>
            
          </div>
          <div class="card-1 dark:bg-slate-800 dark:text-white relative">
            <div id="userChoice" class="dateFilterChoice absolute right-0 mt-5 mr-2">
              <b  class=" text-slate-400">FILTER</b><br>
              <input type="button" value="Today"><br>
              <input type="button" value="This Week"><br>
              <input type="button" value="This Month"><br>
            </div>
            <button id="userDateFilter" class="date-filter absolute right-0"><i class="bi bi-three-dots"></i></button>
            <p>Customers  | <i class=" text-slate-400">Today</i></p>
            <p>{{$countUser}}</p>
          </div>
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white">
          <i class="bi bi-whatsapp"></i>
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white">
          
        </div>
      </div>
      <div>
        <div class="card-2 mt-0 dark:bg-slate-800 dark:text-white">
          <h1 class=" text-xl mb-10 font-bold"> Recent Transactions</h1>
          @foreach ($recents as $index => $recent)
          @if ($recent->status == 'created')
                <i class="absolute bi bi-circle-fill text-blue-500 text-sm ml-1"></i>
                @elseif($recent->status == 'completed')
                <i class="absolute bi bi-circle-fill text-green-500 text-sm ml-1"></i>
                @elseif($recent->status == 'paid')
                <i class="absolute bi bi-circle-fill text-red-500 text-sm ml-1"></i>
                @endif
              <p class="text-slate-600 border--s border-gray  ml-2 pb-6 pl-4">{{$recent->shortenedName}} <b>{{$recent->status}} </b> transaction number {{$recent->trans_id}} </p>
          @endforeach
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white">
          <h1> website Trafic</h1>
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white"></div>
      </div>  
    </div>
  </section>
  <script>
    $(document).ready(function () {
      getSales();
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
      };
      
    });
  </script>
@endsection