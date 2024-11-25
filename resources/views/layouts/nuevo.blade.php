<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" /> --}}
<style>
 body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background-color: #e3e7e6; /* Gris claro */
        }

        header {
            background-color: #1e262b; /* Negro azulado */
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        footer {
            background-color: #1e262b; /* Negro azulado */
            color: white;
            text-align: center;
            padding: 0.5rem;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .menu-lateral {
            background-color: #4d5963; /* Gris oscuro */
            color: white;
            width: 200px;
            padding: 1rem;
            height: calc(100vh - 120px);
        }

        .menu-superior {
            background-color: #ffa500; /* Naranja */
            color: white;
            padding: 0.5rem;
            text-align: center;
        }

        .contenido {
            flex: 1;
            padding: 2rem;
        }

        a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin: 0.5rem 0;
        }

        a:hover {
            text-decoration: underline;
        }
    


</style>


</head>
<body>
    <div class="menu-lateral">
        <h2>Menú Lateral</h2>
        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>

        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>

        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>

        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>

        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>
    </div>

    <div style="flex: 1; display: flex; flex-direction: column;">
        <header>
            <h1>Mi Aplicación</h1>
        </header>

        <div class="menu-superior">
            <p>Menú Superior</p>
        </div>

        <div class="contenido">
            @yield('contenido')
        </div>

        <footer>
            <p>Todos los derechos reservados - 2024</p>
        </footer>
    </div>
</body>
</html>
