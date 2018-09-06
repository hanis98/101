<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-BIT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Laman Utama</a>
                    @else
                        <a href="{{ route('login') }}">Log Masuk</a>
                        <a href="{{ route('register') }}">Daftar Masuk</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <img height="160px"
                src="{{asset('storage/img/ki.gif')}}" alt="">
                <div class="title m-b-md">
                    Sistem Pinjaman Peralatan IT
                     </div>

                <div class="links">
                    <a href="http://101.test/about-us">Tentang Kami</a>
                    <a href="http://101.test/contact-us">Hubungi Kami</a>
                    <a href="http://www.mppg.gov.my/">Laman Utama</a>
                    <a href="http://101.test/application/create">Borang Tempahan</a>
                    
                </div>
            </div>
        </div>
    </body>
</html>
