@extends('admin.layout.main')

@section('contents')
    <div class="">
      
        <form action="/admin/rooms/insert"  method="POST">
        @csrf
        <div class="full-card w-full rounded-md text-md text-slate-600 mb-5 pr-32">
          <div class="grid">
            <i>Product Name :</i><input id="" type="text" class="styled " name="name" placeholder="Detailed Product Name">
            <i>Price ($) : <br></i><input id="" type="text" class="styled " name="price" placeholder="Numbers Without Comma">
            <i>Price ($) : <br></i><select name="" id=""> Select
              <Option>COCK</Option>
            </select>
          </div>
        </div>
        <div class="full-card w-full rounded-md text-md text-slate-600 mb-5 pr-32">
        <p class="font-bold">Product Detail</p>
        <hr> <br>
        <div class="grid">
          <i>Product Name :</i><input id="" type="text" class="styled " name="name" placeholder="Detailed Product Name">
          <i>Price ($) :</i><input id="" type="text" class="styled " name="price" placeholder="Numbers Without Comma">
          <i>Product Display :</i> <div class="">
            <input type="file" class="stylized-File" />
            <input type="file" class="stylized-File " />
            <input type="file" class="stylized-File" />
            <input type="file" class="stylized-File" />
            <input type="file" class="stylized-File" />
          </div>
          <i>Product Descriptions</i><textarea class="styled h-56" name="" id="" cols="30" rows="10"></textarea>
        </div>
        </div>
        <div class="full-card w-full rounded-md text-md text-slate-600 pr-32">
        <div class="grid">
          <i>Product Name :</i><a class="cursor-pointer">+ new Variant</a>
          <i>Price ($) :</i><input id="" type="text" class="styled " name="price" placeholder="Numbers Without Comma">
        </div><br>
        </div>
        <input type="submit" class="submit float-right mt-6 mr-11" value="SUBMIT">
        
        </form>
    </div>
@endsection