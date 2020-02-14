<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title','Libreria')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/modern-business.css')}}" rel="stylesheet">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

     <!-- slick silder multi-imagenes-->
     <link href="{{asset('slick/slick/slick.css')}}"  rel="stylesheet" >
     <link href="{{asset('slick/slick/slick-theme.css')}}"  rel="stylesheet" >
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning fixed-top">
      <div class="container">
        <div class="col-2">
          <a class="navbar-brand" href="{{url('/')}}"><img style="width: 35%; margin: 0%; padding: 0%;" src="{{asset('images/libreria.png')}}">Librería</a> 
        </div>
        
           
              
         
           

         
         
          
            
      
    
            
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
                        <!-- Authentication Links -->
                        @guest
                            <li  class="nav-item" >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                            </li>
                            <li  class="nav-item" >
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{url('/register')}}">{{ __('Registrate') }}</a>
                                @endif
                            </li>
                        @else
                        <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Inicio</a>
            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home')}}">Tablero</a>
                        </li>
                             @if (auth()->user()->admin)
                           <li  class="nav-item" >
                               
                              <a class="nav-link" href="{{url('/admin/products')}}">Gestionar Productos</a>
                                
                            </li>
                             <li  class="nav-item" >
                               
                              <a class="nav-link" href="{{url('/admin/categories')}}">Gestionar Categorias</a>
                                
                            </li>
                            <li  class="nav-item" >
                               
                              <a class="nav-link" href="{{url('/admin/editoriales')}}">Gestionar Editoriales</a>
                                
                            </li>
                            <li  class="nav-item" >
                               
                              <a class="nav-link" href="{{url('/admin/pro')}}">Admin avanzado</a>
                                
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                           
                
          
      
          
          </ul>
        </div>
      </div>
    </nav>
    <header>
        @yield('contentheader')
    </header>
    <!-- Page Content -->
    <div class="container">

       @yield('content')
      
      
     
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    @yield('scripts')
    {{-- BUSCADOR INTELIGENTE --}}
    <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
    
    {{-- vuejs

    <script src="js/app.js"></script> --}}
    
  </body>

</html>

<script>


//buscador inteligente 
$(function(){
            // constructs the suggestion engine
      var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch:'{{url("/products/json")}}'
      });

      $('#inlineFormInputGroup').typeahead({
          hint:true,
          highlight:true,
          minLength:1
      },{
        name:'products',
        source:products
      });


   });
   $(function(){
            // constructs the suggestion engine
      var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch:'{{url("/products/json")}}'
      });

      $('#inlineFormInputGroup2').typeahead({
          hint:true,
          highlight:true,
          minLength:1
      },{
        name:'products',
        source:products
      });
      

   });
</script>
<style type="text/css">
  nav {
-webkit-box-shadow: 0px -4px 12px 9px rgba(0,0,0,0.26);
-moz-box-shadow: 0px -4px 12px 9px rgba(0,0,0,0.26);
box-shadow: 0px -4px 12px 9px rgba(0,0,0,0.26);
  }

  /* buscador inteligente */


.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  
  
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  
  background-color: #ddd;

}

.tt-suggestion p {
  margin: 0;
}

/* tarjeta de descuento */
/* con fill cambiamos el color de la tipografía y los fondos de cada elemento 
Con stroke la línea
*/

svg{
 
 position: absolute;
 z-index: 9;
 bottom: 53%;
 right: 0%;
 
}

/* css triángulo */
.texto-triangulo {
         fill: white;
         font-size:20px;
         font-family:arial;
         letter-spacing:-1px;

       }
       .texto-descuento {
         fill: white;
         font-size:14px;
         font-family:arial;

       }
     /* fondo */
       .triangulo {
         fill:#ff0000;
         opacity:0.9;
       }
/* css oferta */
     /* triángulo */
       .oferta-verde {
         fill:#7ab800;
         opacity:0.9;

       }
     /* texto */
       .texto-oferta-verde {
         fill: white;
         font-size:14px;
         font-family:arial;
       }


/* like */
.like{
  padding-left: 1px;
  padding-bottom: 0px;
  padding-right: 0px;
  padding-top: 0%;
  margin-top: 0%;
}
.con{
  float: right;
  padding-left: 2px;
  padding-right: 2px;
  margin-right:-4%;
  margin-top: -3%;
  right: 0px;
}
/*texto de productos*/
.text{
  overflow:hidden; 
  white-space:nowrap;              
  text-overflow: ellipsis;
}
.text:hover{
  text-decoration: underline;
}
</style>
