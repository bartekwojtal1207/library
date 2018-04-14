<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

    <div class="container">
        <h1 class="text-center">
            Biblioteka
        </h1>
        <div class="col-md-12">
            <div class="search-form">
                <form  method="get">

                    <div class="input-group">
                        <input type="text" placeholder="search" class="input_search ">
                        <button name="search" id="search">
                            <img src="https://maxcdn.icons8.com/iOS7/PNG/25/Very_Basic/search_filled-25.png" alt="szukaj">
                        </button>
                    </div>

                </form>
            </div>
            <div class="search_result">
                <span class="waring-title hidden">za mało znaków</span>
                <span class="no-result-title hidden">brak szukanej frazy</span>
                <ul class="list">
                </ul>
            </div>
        </div>
    </div>
    </body>
</html>
