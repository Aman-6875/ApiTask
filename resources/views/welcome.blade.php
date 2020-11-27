<html>
 <head>
  <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Autocomplete Textbox in Laravel using JQuery</h3><br />

   <div class="form-group">
    <input type="text" name="country_name[]" id="country_name" class="form-control input-lg" placeholder="Enter Country Name" />
    <div id="countryList">
    </div>
   </div>
   {{ csrf_field() }}
  </div>


  {{-- <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label>Enter Multiple Country Name</label>
            <div class="input-group">
                <input type="text" id="search_data" placeholder="" autocomplete="off" class="form-control input-lg" />
                <div class="input-group-btn">
                    <button type="button" class="btn btn-primary btn-lg" id="search">Get Value</button>
                </div>
            </div>
            <br />

        </div>
    </div>
    <div class="col-md-2">

    </div>
</div> --}}
 </body>
</html>

<script>
// $(document).ready(function(){


//  $('#country_name').keyup(function(){
//         var query = $(this).val();
//         if(query != '')
//         {
//          var _token = $('input[name="_token"]').val();
//          $.ajax({
//           url:"{{ route('autocomplete.fetch') }}",
//           method:"POST",
//           data:{query:query, _token:_token},
//           success:function(data){
//            $('#countryList').fadeIn();
//                     $('#countryList').html(data);
//           }
//          });
//         }
//     });

//     $(document).on('click', 'li', function(){
//         $('#country_name').val($(this).text());
//         $('#countryList').fadeOut();
//     });

// });



// function ready(){
//     $('#country_name').keyup(function(){
//         var query = $(this).val();
//         if(query != '')
//         {
//          var _token = $('input[name="_token"]').val();
//          $.ajax({
//           url:"{{ route('autocomplete.fetch') }}",
//           method:"POST",
//           data:{query:query, _token:_token},
//           success:function(data){
//            $('#countryList').fadeIn();
//                     $('#countryList').html(data);
//           }
//          });
//         }
//     });

//     $(document).on('click', 'li', function(){
//         $('#country_name').val($(this).text());
//         $('#countryList').fadeOut();
//     });

// }

// $(document).ready(ready);




$(document).ready(function(){

    $('#country_name').tokenfield({
        autocomplete :{
            source: function(request, response)
            {
                jQuery.get('/autocomplete/fetch', {
                    query : request.term
                }, function(data){
                    data = JSON.parse(data);
                    response(data);
                });
            },
            delay: 100
        }
    });

    $('#country_name').click(function(){
        $('#country_name').text($('#country_name').val());
    });

  });
</script>
