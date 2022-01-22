@extends("layouts.app1")
@section("contenido")
        
    <div class="relative flex justify-center min-h-screen py-4 bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

<body>   
    <section>
        <div class="text-center">
                <h2 class="text-3xl font-extrabold leading-9 text-gray-900 dark:text-white">
                    Base de datos
                </h2>
                <p class="max-w-md mx-auto mt-3 text-xl leading-7 text-gray-500 dark:text-gray-400">
                    Selecciona una base de datos
                </p>
                <a href="{{route('clientes.index')}}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Clientes
                </a>
                <a href="{{route('repartidores.index')}}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Repartidores
                </a>
                <a href="{{route('ciudades.index')}}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Ciudades
                </a>
                <a href="{{route('envios.index')}}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Envios
                </a><a href="{{ url('/email') }}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Contactanos
                </a> 
            </div>
        </div>
    </section>

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
            margin-top: 5%;
            font-size: 45px;
            color: #F4F6F7;
        }
        
        p{
            color: #D0D3D4;
            font-family; 'consolas';
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

        a:hover{
            color: #255784;
            background: #2196f3;
            box-shadow: 0 0 10px #2196f3, 0 0 40px #2196f3, 0 0 80px #2196f3;
            transition-delay: 1s;
        }

        a span {
            position: absolute;
            display: block;
        }

        a span:nth-child(1){
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent,#2196f3);
        }
        a:hover span:nth-child(1){
            left: 100%;
            transition:1s;
        }

        a span:nth-child(2){
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent,#2196f3);
        }
        a:hover span:nth-child(2){
            top: 100%;
            transition:1s;
            transition-delay:0.25s;
        }
        
        a span:nth-child(3){
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent,#2196f3);
        }
        a:hover span:nth-child(3){
            right: 100%;
            transition:1s;
            transition-delay:0.5s;
        }

        a span:nth-child(4){
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent,#2196f3);
        }
        a:hover span:nth-child(4){
            bottom: 100%;
            transition:1s;
            transition-delay:0.75s;
        }

    </style>
</body>
@endsection