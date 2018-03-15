<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
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
                font-size: 100px;
            }
        
            .links > a {
                color: #000;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 300;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
                
        <title>{{config('app.title', 'Tara Na Sa Pinas')}}</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
    
            <div class="content">
                    <img src="/storage/images/logo.png" alt="App Logo" height="200" width="200">  
                <div class="title m-b-md">
                      
                    {{config('app.title', 'Tara Na Sa Pinas')}}
                </div>     
            </div>
        </div>    
    </body>
</html>