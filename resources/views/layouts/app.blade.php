<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="" crossorigin=""/> --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

        @livewireStyles

        <!-- Scripts -->
       
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
            font-family: customFont;
            }

            
            .bg ,footer{
            background:#0F203C;
            }

            .image{
            height:200px;
            }

            .category ul li {
            display: inline-block;
            margin-bottom:5px;
            }

            .category ul li a {
            border: none;
            border-radius: 5px;
            font-size: 14px;
            color: #fff;
            font-weight: #000;
            padding: 5px 19px;
            display: inline-block;
            margin: 0 3px;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
            cursor: pointer;
            }


            .v_line {
            border-left: 1px solid rgb(240, 240, 235);
            height: 190;
            }
            .rating  {
            color:gold;
            }

            .rating > h5 {
            color:rgb(87, 83, 83);
            }

            .rating:not(:checked) > input {
            display:none;
            cursor: pointer;
            }

            .rating:not(:checked) > label:before {
            content: '★';
            }

            .rating:not(:checked) > label {
            float:left;
            cursor:pointer;
            font-size:160%;
            color:#ddd;
            }

            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label {
            color: gold;
            }

            .rating > input:checked ~ label {
            color: gold;
            }

            #place_url {
            text-align: left;
            unicode-bidi: plaintext;
            }    

            #addressList {
            cursor:pointer;
            }


        </style>
    </head>
    <body class="font-sans antialiased" dir="rtl" style="font-family: customFont;">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="flex justify-center p-5 " style="background:#0F203C;">
            <a href="https://academy.hsoub.com" class="justify-self-center">
                <img class="w-24"  src="https://academy.hsoub.com/uploads/monthly_2016_01/SiteLogo-346x108.png.dd3bdd5dfa0e4a7099ebc51f8484032e.png" alt="أكاديمية حسوب">
            </a>
        </footer>

        @stack('modals')

        @livewireScripts

        <script>
            $(function(){
                $('#address').on('keyup',function() {
                    var address = $(this).val();
                    $('#address-list').fadeIn();

                    $.ajax({
                        url: "{{route('auto-complete')}}",
                        type: "GET",
                        data: {"address" : address}
                    }).done(function(data) {
                        $("#address-list").html(data);
                    });
                });
                $('#address-list').on('click', 'li', function(){
                    $('#address').val($(this).text());
                    $('#address-list').fadeOut();
                });
            });
        </script>
    </body>
</html>
