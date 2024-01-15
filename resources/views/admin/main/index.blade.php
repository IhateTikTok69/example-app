@extends('admin.layout.main')
@section('contents')
    <div class="seperator">
      <div class="main-cards">
        <div class="highlight-1">
          <div class="card-1 dark:bg-slate-800 dark:text-white relative">
            <div id="salesChoice" class="dateFilterChoice absolute right-0 mt-5 mr-2 text-slate-700 p-2 text-sm">
              <b  class=" text-slate-400 font-thin text-base">FILTER</b><br>
              <input class="salesDataSelector" type="button" value="Today"><br>
              <input class="salesDataSelector" type="button" value="This Week"><br>
              <input class="salesDataSelector" type="button" value="This Month"><br>
            </div>
            <button id="salesDateFilter" class="date-filter absolute right-0"><i class="bi bi-three-dots"></i></button>
            <p class="text-lg "> Sales | <i class="salesIndicator text-slate-400">Today</i> </p> 
            <div class="flex mt-2 "> <div class="aspect-square text-4xl w-16 text-blue-400 p-4 rounded-full bg-blue-50"><img src="/assets/receipt.png" class="w-20 mr-3" alt=""></div><div id="salesData" class="text-2xl pt-3 pl-2 font-extrabold">  </div></div>
          </div>
          <div class="card-1 dark:bg-slate-800 dark:text-white relative">
            <div id="revenueChoice" class="dateFilterChoice absolute right-0 mt-5 mr-2 text-slate-700 p-2 text-sm">
              <b  class=" text-slate-400 font-thin text-base">FILTER</b><br>
              <input class="revDataSelector"  type="button" value="Today"><br>
              <input class="revDataSelector"  type="button" value="This Week"><br>
              <input class="revDataSelector"  type="button" value="This Month"><br>
            </div>
            <button id="revenueDateFilter" class="date-filter absolute right-0"><i class="bi bi-three-dots"></i></button>
            <p class="text-lg ">Revenue | <i class="revIndicator text-slate-400">Today</i></p>
            <div class="flex mt-2"><div class="aspect-square text-4xl w-16 text-green-400 p-4 rounded-full bg-green-100"><img src="/assets/currency-dollar.png" class="w-32" alt=""></div><div id="revData" class="text-2xl pt-3 pl-2 font-extrabold"></div></div>
          </div>
          <div class="card-1 dark:bg-slate-800 dark:text-white relative">
            <div id="userChoice" class="dateFilterChoice absolute right-0 mt-5 mr-2 text-slate-700 p-2 text-sm">
              <b  class=" text-slate-400 font-thin text-base">FILTER</b><br>
              <input class="userDataSelector" type="button" value="Today"><br>
              <input class="userDataSelector"  type="button" value="This Week"><br>
              <input class="userDataSelector" type="button" value="This Month"><br>
            </div>
            <button id="userDateFilter" class="date-filter absolute right-0"><i class="bi bi-three-dots"></i></button>
            <p class="text-lg ">Customers  | <i class=" userIndicator text-slate-400">Today</i></p>
            <div class="flex mt-2"><div class="aspect-square text-4xl w-16 text-green-400 p-4 pt-5 rounded-full bg-orange-100"><img src="/assets/people.png" class="w-10 mr-3" alt=""></div><div id="userData" class="text-2xl pt-3 pl-2 font-extrabold"> </div></div>
          </div>
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white h-fit  pl-10px">
          <p class="text-lg ">Monthly | <i class=" text-slate-400">Revenue Reports </i> </p>
          <div id="myChart"></div>
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white">
          <p class="text-lg ">Monthly | <i class=" text-slate-400">Top Selling </i> </p>
          
        </div>
      </div>
      <div class="content-2">
        <div class="card-2 mt-0 dark:bg-slate-800 dark:text-white relative text-black h-fit">
          <h1 class=" text-lg mb- font-bold text-blue-950"> Recent | <i class=" text-slate-400 font-thin">Transactions </i></h1>
          @foreach ($recents as $index => $recent)
         <div class="flex"> <span class="w-20 text-sm text-slate-400">{{timeAgo($recent->created_at)}}</span>
          @if ($recent->status == 'created')
                <i class="absolute bi bi-circle-fill text-yellow-500 text-sm "></i>
                @elseif($recent->status == 'completed')
                <i class="absolute bi bi-circle-fill text-green-500 text-sm"></i>
                @elseif($recent->status == 'paid')
                <i class="absolute bi bi-circle-fill text-blue-500 text-sm"></i>
                @elseif($recent->status == 'canceled')
                <i class="absolute bi bi-circle-fill text-red-500 text-sm"></i>
                @endif
              <p class="text-slate-600 border--s border-gray  ml-2 pb-6 pl-4 w-full text-sm ">{{$recent->shortenedName}} <b>{{$recent->status}} </b> transaction number {{$recent->trans_id}} </p>
          </div>
          @endforeach
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white">
          <h1> website Trafic</h1>
        </div>
        <div class="card-2 dark:bg-slate-800 dark:text-white"></div>
      </div>  
    </div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="/js/main.js" data-url="">
</script>
<script type="text/javascript">
    var routeUrls = {
        'route1': "{{ route('dashboard.getSales') }}",
        'route2': "{{ route('dashboard.getRevenue') }}",
        'route3': "{{ route('dashboard.getRegister') }}",
      }
    var _token = '{{ csrf_token() }}';
    var labels =  {!! json_encode($days) !!};
    var value =  {!! json_encode($salesCount) !!};
    console.log('{!! json_encode($days) !!}')
    console.log('{!! json_encode($salesCount) !!}')
    var options = {
      chart: {
        type: 'bar',
        height: 350,
        zoom: {
            enabled: false
          },
        menu: {
          enabled: false
        }
      },
      dataLabels: {
          enabled: false
        },
      stroke: {
        curve: 'straight'
      },
      series: [{
        name: 'Revenue $ ',
        data: value
      }],
      xaxis: {
        categories: labels,
        type: 'datetime',
        labels: {
          datetimeUTC: false
        }
      }
    }

    var chart = new ApexCharts(document.querySelector("#myChart"), options);

    chart.render();
</script>


@endsection