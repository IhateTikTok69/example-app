<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/ap.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/app.css" />
  </head>

  <body class="m-0">
    <div class="py-4 navbar">
      <a href="#" class="text-2xl font-bold text-blue-600">ADMIN PANNEL</a>
      <div class="userArea">
        <button class="float-right ps-1 py-1">Admin Name</button>
        <button class="adminProfile"></button>
        <button class="adminProfile me-5">
          <img src="/assets/mail.png" alt="" />
        </button>
      </div>
    </div>
    <div class="sidePannel pt-10">
    <a href="dashboard" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold ml-5 m-1 choice {{($selected === "dashboard") ? 'selected':''}}">
        <img class="icons" src="assets/squares.png" alt="" /> DASHBOARD</a>
    <a href="rooms" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "rooms") ? 'selected':''}}">
        <img class="icons" src="assets/door.png" alt="" /> ROOMS</a>
    <a href="add" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "add") ? 'selected':''}}">
        <img class="icons" src="assets/add.png" alt="" /> ADD ROOM</a>
    <a href="transactions" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold ml-5 m-1 choice {{($selected === "transactions") ? 'selected':''}}">
        <img class="icons" src="assets/receipt.png" alt="" /> TRANSACTIONS</a>
    <a href="modify" class="text-sm py-2 ps-3 text-left w-64 h-15 block font-semibold  ml-5 m-1 choice {{($selected === "modify") ? 'selected':''}}">
        <img class="icons" src="assets/pen.png" alt="" /> MODIFY</a>
    </div>
    <div class="containers">
        @yield('contents')
    </div>
  </body>
</html>
