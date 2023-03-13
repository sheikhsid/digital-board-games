<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

        <!-- PWA  -->
        <meta name="theme-color" content="#6777ef"/>
        <link rel="apple-touch-icon" href="{{ asset('images/logo/logo.PNG') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">  

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
            }
            @media screen and (min-width: 320px) and (max-width: 767px) and (orientation: landscape) {
                html {
                    transform: rotate(-90deg);
                    transform-origin: left top;
                    width: 100vh;
                    overflow-x: hidden;
                    position: absolute;
                    top: 100%;
                    left: 0;
                }
            }
        </style>

    </head>
    <body>
        <div class="container-fluid" style="padding: 0;">
            <div class="row h-100">
                <div class="col-md-12 col-12">
                    <div class="text-center main">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="row">
                                    <iframe src="/single" height="1080" width="100%" title="Iframe Example" style="transform: rotate(180deg);"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="row">
                                    <iframe src="/single" height="1080" width="100%" title="Iframe Example" style="transform: rotate(180deg);"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="row">
                                    <iframe src="/single" height="1080" width="100%" title="Iframe Example"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="row">
                                    <iframe src="/single" height="1080" width="100%" title="Iframe Example"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>  
        </div>

        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if (!navigator.serviceWorker.controller) {
                navigator.serviceWorker.register("/sw.js").then(function (reg) {
                    console.log("Service worker has been registered for scope: " + reg.scope);
                });
            }
        </script>
    </body>
</html>
