<!DOCTYPE html>
<html lang="en" id="darkmode" class="">
 <head>
  <meta charset="UTF-8" />
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/js/app.js"></script>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <!-- choose one -->
  <link rel="stylesheet" href="/css/app.css" />
  @vite('resources/css/app.css')
  
 </head>

 <body class="m-0 text-blue-950">
  <div class="py-4 navbar dark:bg-slate-800 dark:text-white dark:shadow-md dark:shadow-slate-950">
   <a href="#" class="text-2xl font-bold text-blue-600 dark:text-white">ADMIN PANNEL</a> <button class="ml-10 text-3xl"><i class="bi bi-list"></i></button>
   <div class="userArea">
    <button id="dropdown-1" class="float-right ps-1 py-1 flex"> {{$user->name}} <img class="mt-3 ml-1 w-3 h-2" src="/assets/drop.png" alt=""></button>
    <button id="dropdown-1" class="adminProfile w-10"><img class="rounded-full" src="/assets/usr/rick.webp" alt=""></button>
    <button class="adminProfile me-5">
     <i class="bi bi-chat-left-text icons text-2xl "></i>
    </button>
    
    <button id="themeSelect"><img class="w-10 dark:hidden block mt-1 mr-2" src="/assets/switchD.png" alt=""><img class="w-10 dark:block hidden mt-1 mr-2" src="/assets/switchW.png" alt=""></button>
    <div class="dropdown-user">
     <a href="">Profile</a>
     <form action="logout" method="POST">@csrf <input type="submit" value="Logout"></form>
    </div>
   </div>
  </div>
  <div class="dark:bg-slate-800 dark:text-white sidePannel pt-32 text-blue-900 font-thin text-base">
    <a href="/admin/dashboard" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "dashboard") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-columns-gap mr-2"></i> DASHBOARD</a>
    <a href="/admin/rooms" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "rooms") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-door-open mr-2"></i> PRODUCTS</a>
    <a href="/admin/add" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "add") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi  bi-building-add mr-2"></i> ADD ROOM</a>
    <a href="/admin/transactions" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "transactions") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-receipt mr-2"></i> TRANSCTIONS</a>
    <a href="/admin/modify" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "modify") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-pencil-square mr-2"></i> MODIFY</a>
    <a href="/admin/modify" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "modify") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-bag-plus mr-2"></i> PURCHASE</a>
    <hr class="">
    <a href="/admin/modify" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "profile") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-person-circle mr-2"></i> PROFILE</a>
    <a href="/admin/modify" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "register") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-person-fill-add mr-2"></i> REGISTER </a>
    <a href="/admin/login" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "faq") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-question-circle-fill mr-2"></i> F.A.Q</a>
    <a href="/admin/modify" class=" py-2 ps-3 text-left w-64 h-15 block ml-5 m-1 choice {{($selected === "profile") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-500':''}}">
      <i class="bi bi-sliders mr-2"></i>SETTINGS</a>
  </div> 
  
  <div class="containers dark:bg-slate-400">
    <section class="content">
    <h1 class="text-2xl text-blue-800">{{$Title}}</h1>
    <p class="cursor-default text-black"><i class="text-slate-400 dark:text-slate-50">Home</i> /{{$selected}} </p>
    @yield('contents')
    </section>
    
    
  </div>
 </body>
</html>
