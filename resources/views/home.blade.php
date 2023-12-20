@extends('layout.admin_main')

@section('contents')
<section id="dashboard" class="content active">
    <h1 class="text-2xl font-semibold text-blue-600">Dashboard</h1>
    <p class="cursor-default">Home / Dashboard</p>
    <div class="seperator">
      <div class="main-cards">
        <div class="highlight-1">
          <div class="card-1">
            <h1> Sales</h1>
          </div>
          <div class="card-1">
            <h1>Revenue</h1>
          </div>
          <div class="card-1">
            <h1>Customers</h1>
          </div>
        </div>
        <div class="card-2">
          
        </div>
        <div class="card-2">
          
        </div>
      </div>
      <div>
        <div class="card-2 mt-0">
          <h1> Recent Activity</h1>
        </div>
        <div class="card-2">
          <h1> website Trafic</h1>
        </div>
        <div class="card-2"></div>
      </div>  
    </div>
  </section>
@endsection