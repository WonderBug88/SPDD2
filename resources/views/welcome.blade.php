<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ ENV('APP_NAME') }}">
    <meta name="description" content="{{ ENV('APP_DESC') }}">
    <meta name="base-url" content="{{ url('/') }}">
    <link rel="icon" href="{{ url('/') }}/images/logo.png">
    <meta name="app-name" content="{{ ENV('APP_NAME') }}">
    <!-- <meta name="token" content="{{ csrf_token() }}"> -->
    <!-- <meta name="x-token" content="{{ ENV('X_TOKEN') }}"> -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <title>Laravel 9</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" type="text/css">
    <link href="public{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
</head>

<body>
    <div class="row" style="position: absolute;
    z-index: 10000;
    width: 100%;
    text-align: right;
    padding: 10px 20px;">
        <form method="get" action="{{ route('logout.perform')}}">
            <input type="submit" value="logout">
        </form>
    </div>
    <div id="app">
    </div>
    <script src="public{{  mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>