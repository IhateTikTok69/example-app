<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <p class="font-bold">{{$product->item_name}} </p>
    <p><img class=" w-72" src="/assets/products/{{$product->prevImg}}" alt=""></p>
    <p>
    @foreach ($img as $index => $item)
        <img class=" w-72" src="/assets/products/{{$item->path}}" alt="">
    @endforeach</p>
    <p  class="font-bold"> PRICE : $ {{$product->price}} </p>
    <br>
    {!! $product->item_desc !!}
</body>
</html>