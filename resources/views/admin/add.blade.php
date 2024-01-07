@extends('admin.layout.main')

@section('contents')
    <div class="seperator">
      <div class="full-card w-fit">
        <form action="/admin/rooms/insert"  method="POST">
        @csrf
          <div class="grid">
            <i>Price ($) :</i><input id="" type="text" class="styled" name="price" placeholder="Numbers Without Comma">
            <i>availability :</i>
            <div>
              <select name="availability" id="">
                <option value="1">YES</option>
              </select>
            </div>
            <i>Room Type  :</i> <div>
              <select name="type" id="">
                <option value="Single">Single Room</option>
                <option value="Double">Double Room</option>
                <option value="Twin">Twin Room</option>
                <option value="King">King Room</option>
                <option value="Suite">Suite</option>
                <option value="Penthouse">Penthouse</option>
              </select>
            </div>
          </div><br>
        <p>AMENITIES</p>
        <hr> <br>
        <div class="grid">
          <i>wifi  :</i><div>
            <select name="wifi" id="">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
          </div>
          <i>gym  :</i><div>
            <select name="gym" id="">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
          </div>
          <i>breakfast  :</i><div>
            <select name="breakfast" id="">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
          </div>
          <i>smoking  :</i><div>
            <select name="smoking" id="">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
          </div>
          <i>parking  :</i><div>
            <select name="park" id="">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
          </div>
          <i>pool  :</i> <div>
            <select name="pool" id="">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
          </div>
        </div>
        <input type="submit" class="submit float-right mt-6 mr-11" value="SUBMIT">
        </form>
      </div>
    </div>
@endsection