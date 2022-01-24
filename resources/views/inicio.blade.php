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
   
<section class="start-page parallax-background" id="home">
  
  <div class="opacity"></div>
    <div class="content">
      <div class="text">
      
        <h1>Bienvenido<br/>
        a Teltmax,<span> Confia en nosotros</span></h1>
        
        <a><div class="read-more">Saber más</div></a>
        
      </div>
      <div class="arrow-down"></div>
    </div>

</section>      

<section class="menu">

<div class="menu-content">

<div class="logo">Teltmax</div>
@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 btn btn-info">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700  btn btn-info">Inicio Sesion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700  btn btn-warning">Registrate</a>
                        @endif
                    @endauth
                </div>
            @endif

<div class="clear"></div>  

</div>


</section>
            
        </div>
    </body>
</div>
@endsection