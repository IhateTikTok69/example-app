@extends('admin.layout.main')

@section('contents')
    <div class="seperator">
      <div class="full-card w-fit">
        <form action="/admin/rooms/insert"  method="POST">
        @csrf
          <div class="grid">
            <i>Product Name :</i><input class=" rounded-sm focus:border-0" id="" type="text" class="styled" name="name" placeholder="Numbers Without Comma">
            <i>Price ($) :</i><input id="" type="text" class="styled" name="price" placeholder="Numbers Without Comma">
            <input type="file" class="file:border file:border-solid" />
          </div><br>
        <p>AMENITIES</p>
        <hr> <br>
        <input type="submit" class="submit float-right mt-6 mr-11" value="SUBMIT">
        </form>
      </div>
    </div>
@endsection