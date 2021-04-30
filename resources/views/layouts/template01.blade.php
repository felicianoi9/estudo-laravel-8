<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name')  }}    </title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <style>
        footer{
            position:relative;
            
            bottom: 0;
            left: 0;
            text-align: center;
            width: 100%;
            height: 60px;
            line-height: 60px;
            background: #1F2937;
            color: #fff;
            opacity: 1.5;
            float: left;
            
        }
        main{
            min-height: 79vh;
            
        }
    </style>
    
</head>
<body>
    <div>
        @include('layouts._partials.header')

        <main >
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
              <!-- Replace with your content -->
              <div class="px-4 py-6 sm:px-0">
                <div class="border-2 rounded-lg ">
                    @yield('content')
                </div>
              </div>
              <!-- /End replace -->
            </div>
        </main>

        <footer class=" bottom-0 left-0">
            Desenvolvido por <b>Rogério Feliciano</b>.
        </footer>
    </div>
    
   

</body>
</html>