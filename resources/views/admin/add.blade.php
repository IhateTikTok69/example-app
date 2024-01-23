@extends('admin.layout.main')

@section('contents')
    <div class="mt-5">
      
        <form action="/admin/products/insert"  method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="full-card w-full rounded-md text-md text-slate-600 mb-5 pr-32">
          <div class="grid">
            <i>Product Name : </i><input id="" type="text" class="styled " name="name" placeholder="Detailed Product Name">
            <i>Price ($) : <br></i><input id="" type="text" class="styled w-1/2" name="price" placeholder="Numbers Without Comma">
            <i>Category : <br></i><select name="category" id=""> Select
              <Option disabled> Select Category</Option>
            </select>
            <i>Sub-category : <br></i><select name="sub-category" id=""> Select
              <Option disabled> Select Category</Option>
            </select>
          </div>
        </div>
        <div class="full-card w-full rounded-md text-md text-slate-600 mb-5 pr-32">
        <p class="font-bold">Product Detail</p>
        <hr> <br>
        <div class="grid">
          <i>Product Display :</i> <div class="">
            <label for="file-1" class="stylized-File relative">
              <img class="mt-2 ml-2 opacity-90 h-32 w-32 hidden absolute" id="preview-1" src="#" alt="">
              <i id="" class="bi bi-image mt-6"></i>
              <p>Main Preview</p>
              <input href='1' id="file-1" type="file" name="previmg" class="hidden" />
            </label>
            <label for="file-2" class="stylized-File relative">
              <img class="mt-2 ml-2 opacity-80 h-32 w-32 hidden absolute" id="preview-2" src="#" alt="">
              <i class="bi bi-image"></i>
              <p>image - 1</p>
              <input href='2' id="file-2" type="file" name="img1" class="hidden " /></label>
            <label for="file-3" class="stylized-File relative">
              <img class="mt-2 ml-2 opacity-80 h-32 w-32 hidden absolute" id="preview-3" src="#" alt="">
              <i class="bi bi-image"></i>
              <p>image - 2</p>
              <input href='3' id="file-3" type="file" name="img2" class="hidden " />
            </label>
            <label for="file-4" class="stylized-File relative">
              <img class="mt-2 ml-2 opacity-80 h-32 w-32 hidden absolute" id="preview-4" src="#" alt="">
              <i class="bi bi-image"></i>
              <p>image - 3</p>
              <input href='4' id="file-4" type="file" name="img3" class="hidden " /></label>
            <label for="file-5" class="stylized-File relative">
              <img class="mt-2 ml-2 opacity-80 h-32 w-32 hidden absolute" id="preview-5" src="#" alt="">
              <i class="bi bi-image"></i>
              <p>image - 5</p>
              <input href='5' id="file-5" type="file" name="img4" class="hidden " />
            </label>
          </div>
          <i>Product Descriptions :</i><textarea class="" name="item_desc" ></textarea>
        </div>
        </div>
        <div class="full-card w-full rounded-md text-md text-slate-600 pr-32">
        <div class="grid">
          <i>Product Name :</i><a class="cursor-pointer">+ new Variant</a>
          <i>Dimentions (Height + Width + Length) :</i>
          <div>
            <input id="" type="text" class="styled w-24" name="Height" placeholder="Height"> x
            <input id="" type="text" class="styled w-24" name="Width" placeholder="Width"> x
            <input id="" type="text" class="styled w-24" name="Length" placeholder="Length">
          </div>
          <i>Weight (grams) :</i> <input type="text" class="styled w-1/2" name="weight" id="" placeholder="weight in grams">
          <i>Item Stock :</i> <input type="text" class="styled w-1/2" name="stock" id="" placeholder="Number of items available for sale">
        </div><br>
        <input type="submit" class="submit float-right mt-6 mr-11" value="SUBMIT">
        </div>
        </form>
    </div>
  <script src="https://cdn.tiny.cloud/1/rswk0figwsg8qbz4dk2y2q9kucg0ycw2hcr3l8ii7ifpnpyg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
    selector: 'textarea',
    plugins: 'code',
    toolbar: 'undo redo | bold italic underline strikethrough  | tinycomments | emoticons charmap',
    menubar: 'happy',
  });
  </script>
  <script>
    $(document).ready(function () {
      $('#file-1').change(function () { 
        const add = $(this).attr('href');
        const [file] = this.files
        $('#preview-'+add).attr('src', URL.createObjectURL(file))
        if($('#preview-'+add).hasClass('hidden')){
          $('#preview-'+add).removeClass('hidden')
        }
        else{
          $('#preview-'+add).addClass('hidden')
        }
      });
      $('#file-2').change(function () { 
        const add = $(this).attr('href');
        const [file] = this.files
        $('#preview-'+add).attr('src', URL.createObjectURL(file))
        if($('#preview-'+add).hasClass('hidden')){
          $('#preview-'+add).removeClass('hidden')
        }
        else{
          $('#preview-'+add).addClass('hidden')
        }
      });
      $('#file-3').change(function () { 
        const add = $(this).attr('href');
        const [file] = this.files
        $('#preview-'+add).attr('src', URL.createObjectURL(file))
        if($('#preview-'+add).hasClass('hidden')){
          $('#preview-'+add).removeClass('hidden')
        }
        else{
          $('#preview-'+add).addClass('hidden')
        }
      });
      $('#file-4').change(function () { 
        const add = $(this).attr('href');
        const [file] = this.files
        $('#preview-'+add).attr('src', URL.createObjectURL(file))
        if($('#preview-'+add).hasClass('hidden')){
          $('#preview-'+add).removeClass('hidden')
        }
        else{
          $('#preview-'+add).addClass('hidden')
        }
      });
      $('#file-5').change(function () { 
        const add = $(this).attr('href');
        const [file] = this.files
        $('#preview-'+add).attr('src', URL.createObjectURL(file))
        if($('#preview-'+add).hasClass('hidden')){
          $('#preview-'+add).removeClass('hidden')
        }
        else{
          $('#preview-'+add).addClass('hidden')
        }
      });


    });
  </script>
@endsection