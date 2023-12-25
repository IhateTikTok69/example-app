      @if (session()->has('email'))
      <div class="alert">
        {{session('email')}}
      </div>
  @endif
  @dump(session('email'))
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/app.js"></script>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/css/app.css" />
        @vite('resources/css/app.css')
      </head>
<body>
    <div class="admin_login">
      
      <h1 class=" text-4xl">Login Page</h1>
      <form action="/admin/login" method="POST">
        @csrf
        <input required name="username" id="username" 
        class=" w-2/4 text-center border-1 mb-5 mt-5 p-1 invalid" type="text" placeholder="username" value="{{old ('username')}}"><br>
        <input required name="password" id="password" 
        class=" w-2/4 text-center mb-5 p-1" type="password" placeholder="password"><br>
        <input class=" cursor-pointer" type="submit" value="LOG-IN">
      </form>

    </div> 
</body>
</html>
