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
        <div class="col-md-6 col-12 offset-md-3">
            <div class="row">
                <div class="col-md-12 col-12">
                <div class="text-center boxes">
                        <h1 class="error-title">Benvenuto</h1>
                        <p class="fs-5 text-gray-600">Seleziona qualsiasi gioco</p>
                        <div class="row">
                        @foreach($games as $game)
                            <div class="col-md-6 col-6">
                                <form method="POST" action="{{ route('play') }}">
                                @csrf
                                <input type="hidden" name="game_id" value="{{$game['id']}}"></br>
                                <button type="submit" class="btn me-1 mb-1">
                                    <img src="{{ asset('images/blank-img.jpg') }}" class="img-thumbnail">
                                </button>
                                </form>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>    
            </div>  
        </div>
    </body>
</html>
