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
    <link rel="stylesheet" href="/css/app.css" />
    <!-- choose one -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    @vite('resources/css/app.css')
  </head>

  <body class="m-0 font-mono text-blue-600">
    <div class="py-4 navbar dark:bg-slate-800 dark:text-white dark:shadow-md dark:shadow-slate-950">
      <a href="#" class="text-2xl font-bold text-blue-600 dark:text-white">ADMIN PANNEL</a>
      <div class="userArea">
        <button id="dropdown-1" class="float-right ps-1 py-1 flex"> {{$user->name}} <img class="mt-3 ml-1 w-3 h-2" src="/assets/drop.png" alt=""></button>
        <button id="dropdown-1" class="adminProfile w-10"><img class="rounded-full" src="/assets/usr/rick.webp" alt=""></button>
        <button class="adminProfile me-5">
          <img class="icons dark:hidden w-7" src="/assets/mail.png" alt="" /> <img class="icons hidden dark:inline " src="/assets/mailW.png" alt="" />
        </button>
        <button id="themeSelect"><img class="w-12  dark:hidden block mt-1 mr-2" src="/assets/switchD.png" alt=""><img class="w-12 dark:block hidden mt-1 mr-2" src="/assets/switchW.png" alt=""></button>
        <div class="dropdown-user">
          <a href="">Profile</a>
          <form action="logout" method="POST">@csrf <input type="submit" value="Logout"></form>
        </div>
      </div>
    </div>
    <div class="dark:bg-slate-800 dark:text-white sidePannel pt-32 text-blue-500">
      <a href="/admin/dashboard" class=" text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold ml-5 m-1 choice {{($selected === "dashboard") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <img class="icons dark:hidden " src="/assets/squares.png" alt="" /> <img class="icons hidden dark:inline " src="/assets/squaresW.png" alt="" /> </i> DASHBOARD</a>
      <a href="rooms" class=" text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "rooms") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <img class="icons dark:hidden " src="/assets/door.png" alt="" /> <img class="icons hidden dark:inline" src="/assets/doorW.png" alt="" /> </i> ROOMS</a>
      <a href="add" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "add") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <img class="icons dark:hidden " src="/assets/add.png" alt="" /> <img class="icons hidden dark:inline" src="/assets/addW.png" alt="" /> ADD ROOM</a>
      <a href="transactions" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold ml-5 m-1 choice {{($selected === "transactions") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <img class="icons dark:hidden " src="/assets/receipt.png" alt="" /> <img class="icons hidden dark:inline" src="/assets/receiptW.png" alt="" /> TRANSACTIONS</a>
      <a href="modify" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "modify") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <img class="icons dark:hidden " src="/assets/pen.png" alt="" /> <img class="icons hidden dark:inline" src="/assets/penW.png" alt="" /> MODIFY</a>
      <hr class="">
      <a href="modify" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "profile") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <i data-featheres="circle"></i> PROFILE</a>
      <a href="modify" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "register") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <i data-featheres="edit"></i> REGISTER </a>
      <a href="login" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "faq") ? 'selected bg-blue-100 dark:bg-slate-500 font-bold dark:text-white text-blue-800':''}}">
        <i data-featheres="help-circle"></i> F.A.Q</a>
    </div> 
    
    <div class="containers dark:bg-slate-400">
        @yield('contents')
    </div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
