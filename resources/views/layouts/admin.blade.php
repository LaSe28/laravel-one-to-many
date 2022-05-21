<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'laravel')}} | @yield('title')</title>
    <script src="{{asset('js/app.js')}} defer"></script>
    <link rel="stylesheet" href="{{asset( 'css/app.css' )}}">
</head>
<body>
    @yield('content')
    <div id="popup" class="popup hidden">
        <div class="message">
        </div>
    </div>
</body>
</html>
