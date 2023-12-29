@extends('admin.layout.main')

@section('contents')
<section id="add" class="content">
    <h1 class="text-2xl font-semibold text-blue-600">Add Rooms</h1>
    <p class="cursor-default">Home / Add Rooms</p>
    <div class="seperator">
      <div class="full-card">
        <form action="/admin/rooms/insert" method="POST">
        @csrf
        <input id="" type="text" name="price"><label for="price">Price</label><br>
        <input type="radio" name="availability" id="" value="1"> YES
        <input type="radio" name="availability" id="" value="0"> NO<br>
        <input type="radio" name="wifi" id="" value="1"> YES
        <input type="radio" name="wifi" id="" value="0"> NO<br>
        <input type="radio" name="gym" id="" value="1"> YES
        <input type="radio" name="gym" id="" value="0"> NO<br>
        <input type="radio" name="breakfast" id="" value="1"> YES
        <input type="radio" name="breakfast" id="" value="0"> NO<br>
        <input type="radio" name="smoking" id="" value="1"> YES
        <input type="radio" name="smoking" id="" value="0"> NO<br>
        <input type="radio" name="park" id="" value="1"> YES
        <input type="radio" name="park" id="" value="0"> NO<br>
        <input type="radio" name="pool" id="" value="1"> YES
        <input type="radio" name="pool" id="" value="0"> NO<br>
        <input type="submit" value="SUBMIT">
        </form>
      </div>
    </div>
  </section>
@endsection