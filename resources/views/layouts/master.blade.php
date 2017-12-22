<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    
<style type='text/css'>

body{
background:white;
}

a, a:hover{
text-decoration: none;
}
.custom-font{
}

#header{
background: #F2F2F2;
height: 90px;
display: flex;
align-items: center;
}

.main-links{
height:30px;
line-height: 30px;
background: #4D4D4D;
border-radius: 6px;
}

.main-links a{
color:#B3B3B3;
font-size:1.3em;
}

.main-links a:hover{
color: white;
font-size:1.3em;
}

.icons-links{
margin-right:20px
}

</style>

</head>
<body>
    <div id="app">

        @include('inc.navbar')
        <div class='container'>
            @include('inc.messages')
            @yield('content')
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- POPUP PLUGIN -->
    <script type="text/javascript" src="{!! asset('js/jquery.popupoverlay.js') !!}"></script>
    @yield('script')
</body>
</html>
