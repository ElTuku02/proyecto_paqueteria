@extends("layouts.app1")
@section("contenido")
<style>
    body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #031321;
            font-family: 'consolas';
        }
    h2{
        color:white;
    }

    a{
            position: relative;
            display: inline-block;
            padding: 15px 30px;
            color: #2196f3;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-decoration: none;
            font-size: 24px;
            overflow: hidden;
            transition: 0.2s;
        }
</style>
<div class="text-center">
    <h2 class="text-3xl font-extrabold leading-9 text-white-900 dark:text-white">
        Servicio de Paqueteria
    </h2>
    <br>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFISBa1bu_0Wig5SVzgCbExJ2ggazlM3Z9FZJe7cYsh34K90ZMukWw6Ge2xYIao3YnQO4&usqp=CAU" alt="img">
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Inicio Sesion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrate</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            
            
        </div>
    </body>
</div>
@endsection