<!doctype html>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Broadcast Redis Socket io</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">
    <h1>Listeing</h1>
    <div id="appendData"></div>
</div>

</body>

<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
    console.log(window.laravel_echo_port)
</script>

<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>

<script type="text/javascript">

    window.Echo.channel('chat')
        .listen('ChatMessage', (response) => {
            console.log(response)
            $("#appendData").append('<div class="alert alert-success">'+response.message+'</div>');
        });

</script>

</html>
