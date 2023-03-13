<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                margin: 0; 
                height: 100%; 
                overflow: hidden
            }h1.error-title {
                font-size: 80px;
            }
            .text-gray-600 {
                font-size: 35px !important;
            }
        </style>
    </head>
    <body>
        <a href="/single" class="cancel-icon"><i class="bi bi-x-circle"></i> Annulla</a>
        <iframe src="{{$play['iframe']}}" title="" width="100%" style="height: 100%;"></iframe>
    </body>
</html>
