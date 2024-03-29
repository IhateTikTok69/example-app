@extends('admin.layout.main')

@section('contents')
    <div class="seperator-2">
      <div class="main-cards">
        <div class="full-card">
            <div id="roomData">
                
            </div>
        </div>
      </div>
      <div>
        <div class="card-2 mt-0">
          <h1 class=" text-xl text-center">Filter Rooms</h1>
          <input id="availability" type="checkbox" name="amenities[]" value="availability"> 
          <label for="availability">availability</label><br>
          <input id="wifi" type="checkbox" name="amenities[]" value="wifi"> 
          <label for="wifi">wifi</label><br>
          <input id="gym" type="checkbox" name="amenities[]" value="gym">
          <label for="gym">gym</label><br>
          <input id="breakfast" type="checkbox" name="amenities[]" value="breakfast">
          <label for="breakfast">breakfast</label><br>
          <input id="smoking" type="checkbox" name="amenities[]" value="smoking">
          <label for="smoking">Smoking</label> <br>
          <input id="park" type="checkbox" name="amenities[]" value="park"> 
          <label for="park">park</label><br>
          <input id="pool" type="checkbox" name="amenities[]" value="pool"> 
          <label for="pool">pool</label><br>
          <hr class="color-black m-5 mt-0">
        </div>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Define amenities in a broader scope
            var amenities = [];

            fetch_data();

            function fetch_data(page = 1) {
                $.ajax({
                    url: '{{ url('admin/products/fetchData') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        page: page,
                    },
                    success: function(data) {
                        $('#roomData').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Ajax request failed');
                    }
                });
            }
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page); // Fetch data with current amenities
                console.log(amenities);
            });
        });

    </script>
   
@endsection