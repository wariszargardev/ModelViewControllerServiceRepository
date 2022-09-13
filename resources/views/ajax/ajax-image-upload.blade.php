<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laravel 9 Ajax Image Upload with Preview Tutorial - Webappfix!</title>
</head>
<body>

<div class="container mt-5">
   <div class="card">
       <div class="card-header">
           Image upload & preview
       </div>
       <div class="card-body">
           <form action="#" id="file-upload-form">
               @csrf
               <h5>Please run php artisan storage:link</h5>
               <div class="form-group">
                   <input type="file" class="form-control" type="text" id="files">
               </div>
           </form>
           <div class="mt-3" id="img"></div>
       </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(function(){
        $('#file-upload-form').change(function(){

            var form = new FormData();

            var files = $('#files')[0].files;

            form.append('file',files[0])
            form.append('_token',$('input[name=_token]').val())

            $.ajax({
                type: "POST",
                url: "{{ route('form.submit') }}",
                data: form,
                cache:false,
                processData:false,
                contentType:false,
                success: function (response) {
                    $('#img').append('<img src="'+response.path+'" alt="image">');
                },
                error:function(error){
                    alert(error);
                }
            });
        })
    })
</script>
</body>
</html>
