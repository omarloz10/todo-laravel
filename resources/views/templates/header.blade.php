@component('navbar')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .nav_container{
        background: red;
    }


</style>

<body>
    <div class="nav_container">
        <nav class="navbar">
            <ul class="navbar_container">
                <li class="navbar_container-link"><a href="">Home</a></li>
                <li class="navbar_container-link"><a href="">Todos</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
@yield('content')
    
