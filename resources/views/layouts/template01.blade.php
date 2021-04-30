<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name')  }}    </title>
    <style>
        *,body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header{
            background: #ff0000;
            margin-bottom: 20px;
            color: #fff;
            height: 200px;
            text-align: center;
            line-height: 200px;
        }
        footer{
            background: #ff0000;
            color: #fff;
            height: 100px;
            text-align: center;
            line-height: 100px;
            position: absolute;
            float: left;
            width: 100%;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <header>
        <h2>Topo e Menus</h2>
    </header>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        Desenvolvido por <b>Rogério Feliciano</b>.
    </footer>
</body>
</html>