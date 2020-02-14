@extends('layouts.app') 

@section('title','Bienvenido')
@section('contentheader')

    @include('layouts.notification')     

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('{{asset('images/libro1.jpg')}}');width: 100%;  margin: 0%; padding: 0%;">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{asset('images/libro2.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{asset('images/libro3.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    
@endsection

@section('content')
    
      <div class="fixed-top fe "style=" z-index: 1; top: 45%; width:8%">
  @guest  
  @else
     @if (auth()->user()->cart->details->count()==0) 
      <a  class="btn btn-primary pl-1 b  " href="{{url('/home')}}">
  <span style="font-size: 19px; ">
            <i class = "fas fa-cart-plus" style=""></i>
      </span>
    </a>
    <br>
    <a  class="btn btn-warning pl-1 b  " href="{{url('/admin/chat')}}">
      <span style="font-size: 19px; ">
                <i class="far fa-comments"></i>
          </span>
        </a>
    @else
         <a  class="btn btn-primary pl-1 b" href="{{url('/home')}}">
  <ruby><span style="font-size: 19px; ">
            <i class = "fas fa-cart-plus" style=""></i>
      </span><rt><span class="badge badge-light num ml-0" style="font-size: 10px; position:absolute; top: 20px;left: 20px  ">{{auth()->user()->cart->details->count()}}</span></rt></ruby>
    </a><br>
    <a  class="btn btn-warning pl-1 b" href="{{url('/admin/chat')}}">
      <ruby><span style="font-size: 19px; ">
              <i class="far fa-comments"></i>
          </span><rt><span class="badge badge-light num ml-0" style="font-size: 10px; position:absolute; top: 65px;left: 20px  ">{{auth()->user()->cart->details->count()}}</span></rt></ruby>
        </a>
@endif
 @endguest

    <br>
  
    <button type="button" class="btn btn-dark pl-2 b" data-toggle="modal" data-target="#exampleModalCenter">
  <span style="font-size: 18px; color: #ffc107 ">
           <i class="fas fa-search"></i>
      </span>
</button>
   </div>


   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Busca tu libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="row mb-3 justify-content-center">
              <form method="get" action="{{url('/search')}}" class="col-12 ">
              {{csrf_field()}}
             
                  <label class="sr-only" for="inlineFormInputGroup">por Nombre del libro </label>
                  <div class="input-group w-100  justify-content-center">
                    
                  <input type="text" class="form-control " id="inlineFormInputGroup" placeholder="Libro" name="query" required>
                    <div class="input-group-prepend ">
                      <div class="input-group-text py-0 px0 badge-secondary"><button class="  btn btn-warning my-0 mx-0 py-0 "><i class="  fas fa-search"></i></button></div>
                    </div>
                  </div>
          
              
              </form>
              </div>
              <div class="row mb-1 justify-content-center ">
                 <div class="col-12 dropdown ">
                    <button class="btn btn-secondary dropdown-toggle w-100 " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Por Categorias <i class="pt-1 fas fa-angle-down float-right"></i>
                    </button>
                    <div class="dropdown-menu w-50 " aria-labelledby="dropdownMenu2">
                       @foreach ($categories as $category)
                      <a class="dropdown-item" href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
                       @endforeach
                    </div>
                  </div>
              </div>

            
              
            
      </div>
      
    </div>
  </div>
</div>

    <!-- Page Content -->
    <div class="container">
       
      <h1 class="my-4">Bienvenido</h1>
      <hr>
      <!-- Marketing Icons Section   d-sm-none--celulares-->

      <div class="row">
        <div class="col-lg-4 mb-4 d-none d-md-block">
          <div class="card h-100">
            <h4 class="card-header">Title 1</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-dark">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Title 2</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-dark">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4 d-none d-md-block">
          <div class="card h-100">
            <h4 class="card-header">Title 3</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-dark">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
       <h2 class="my-4">Buscador</h2>
      <hr>
      <div class="row mb-5 justify-content-center">
        <form method="get" action="{{url('/search')}}" class="col-lg-3 col-10 col-md-5 px-0  ">
        {{csrf_field()}}
       
            <label class="sr-only" for="inlineFormInputGroup2">por Nombre del libro </label>
            <div class="input-group ">
              
              <input type="text" class="form-control" id="inlineFormInputGroup2" placeholder=" Por Nombre del Libro" name="query" required>
              <div class="input-group-prepend ">
                <div class="input-group-text py-0 px0 badge-secondary"><button class="  btn btn-warning my-0 mx-0 py-0 "><i class="  fas fa-search"></i></button></div>
              </div>
            </div>
    
        
        </form>
        <div class="col-lg-3 col-10 col-md-5 mt-2 mt-sm-0 ">
           <div class="dropdown ">
              <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Por Categorias <i class="pt-1 fas fa-angle-down float-right"></i>
              </button>
              <div class="dropdown-menu w-100" aria-labelledby="dropdownMenu2">
                 @foreach ($categories as $category)
                <a class="dropdown-item" href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
                 @endforeach
              </div>
            </div>
        </div>

      
        
      </div>
      

    
        @guest  
          @else
              @if(auth()->user()->product_categoris)
              
                @foreach (auth()->user()->categorys()->get() as $category)
                @if ($category->products()->get()->count()>=10)
        
                <h2>{{$category->name}}</h2>
                        <hr>
                    <div class="row autoplay">

                     @foreach ($category->products()->get() as $product )
                     
      <div class="col-lg-2 col-md-4 col-sm-4 col-6  portfolio-item">
          <div class="card h-100 hover" >
          <div id="effect-hover">
            <div class="img text-center">
          
            <a href="{{url('/products/'.$product->id.'')}}" class="text-center"><img class="card-img-top img-fluid shadow bg-white rounded "style="height: 210px; width: 150px;  -webkit-box-shadow: 0px -3px 40px 3px rgba(0,0,0,0.17);
-moz-box-shadow: 0px -3px 40px 3px rgba(0,0,0,0.17);
box-shadow: 0px -3px 40px 3px rgba(0,0,0,0.17);" src="{{$product->featured_image_url}}" alt="" width="" height=""  >


</a>

          

       
            </div>
            </div>
            <div class=" pl-1 pr-1 pb-0  pt-2 my-0 py-0 card-body text-center" >
             
               
                 
                <a href="{{url('/products/'.$product->id.'')}}" class="text-warning  text-capitalize  font-weight-bold" style="font-size: 13px;line-height: 12px;"><P>{{$product->name}}</P></a>
              
              
            </div>
            <div class="card-footer  text-center  mx-0 my-0 py-0 px-0 pb-0" >
               <a href="{{url('/products/'.$product->id.'')}}" class="btn mx-0 my-0 px-0 pt-1 pb-1 text-center" >  COP$ <span class="badge badge-warning" style="font-size: 16px;">{{$product->price}}</span></a>

               

             </div>
          </div>
        </div>



                     @endforeach
                     </div>
                     @endif
                @endforeach
              @endif
         @endguest  
      

      <!-- Portfolio Section -->
      <h2>Libros Recientes</h2>
       <hr>
     
           <div class="row">
      
       @foreach ($products as $product)
        <div class="col-lg-2 col-md-4 col-sm-4 col-6  portfolio-item">
          <div class="card h-100 hover" >
          <div id="effect-hover">
            <div class="img text-center">
              
            <a href="#" class="text-center"><img class="card-img-top img-fluid shadow bg-white rounded "style="height: 210px; width: 150px;  -webkit-box-shadow: 0px -3px 40px 3px rgba(0,0,0,0.17);
-moz-box-shadow: 0px -3px 40px 3px rgba(0,0,0,0.17);
box-shadow: 0px -3px 40px 3px rgba(0,0,0,0.17);" src="{{$product->featured_image_url}}" alt="" width="" height=""  ></a>
           <!--  <div class="btn-group btn-group-toggle  "style="z-index:5;" data-toggle="buttons" title = "Malo">
                  <label class="btn btn-secondary btn-sm px-1 pr-0 py-0">
                    <input type="radio" name="options" id="option2" autocomplete="off"> 20 <i class="far fa-thumbs-down"></i>
                  </label>
                  <label class="btn btn-secondary btn-sm pl-1 pr-0 py-0" title = "Bueno">
                    <input type="radio" name="options" id="option3" autocomplete="off"> 30 <i class="far fa-thumbs-up"></i>
                  </label>
                </div>-->
      <div class="re">
       @if ($product->discount!=0)
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
              <!--- Etiqueta Oferta de Promoción -->
                <g>
                  <!--- Etiqueta -->
                  <path fill-rule="evenodd" clip-rule="evenodd" class="oferta-verde" d="M0,0h41.4L100,58.6V100L0,0z"/>
                  <!--- Texto -->
                  <text x="20" y="38" transform="rotate(45 48 48)" class="texto-oferta-verde">OFERTA</text>  
                </g>
              <!--- Etiqueta Superior triangular -->
                <g>  
                  <path fill-rule="evenodd" clip-rule="evenodd" class="triangulo" d="M100,0v59L41,0H100z"/>
                  <!--- Texto triángulo -->  
                <text x="30" y="11" transform="rotate(45 48 48)" class="texto-triangulo">-{{$product->discount}}</text>
                  <text x="57" y="11" transform="rotate(45 48 48)" class="texto-descuento">%</text>
                </g>  

        
        </svg>
      @endif
     

      </div>
      <div id="efecto">
     
             <div class="com">
              <a href="{{url('/products/'.$product->id.'')}}" class="btn btn-success  btn-md " title="Comprar libro"><i class="fas fa-money-bill-wave"></i> Comprar</a>
            </div>
            <div class="car ">
              
              @guest
                <a  class=" btn btn-success  btn-md "  href="{{ route('login') }}" title="Añadir al carrito"><i class = "fas fa-cart-plus" ></i> Añadir</a>
              @else
              <a  title="Añadir al carrito" class="open-AddBookDialog btn btn-success  btn-md " data-id=""data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}" href="{{$product->id}}"><i class = "fas fa-cart-plus" ></i> Añadir</a>
              @endguest
            </div>
            <!-- Button trigger modal -->
           

           
      
      </div>

       <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter{{$product->id}}" tabindex="5" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Añadir al carrito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form method="post" action="{{url('/cart')}}">
                    {{csrf_field()}}
                  <input type="hidden" name="product_id" value="{{$product->id}}"  >
                  <input type="hidden" name="price" value="{{$product->price}}">
                  <div class="modal-body">
                    Cantidad <input type="number" placeholder="1" value="1" name="quantity" class="form-control " min="1" max="20"/>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="sutmit" class="btn btn-primary" title = "Añadir al carrito">Añadir</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
            </div>
            <div class=" pl-1 pr-1 pb-0  pt-2  py-0 card-body text-center row" >
             
               <div class="col-12  mx-0 my-0 pt-0 pb-1 text-warning  my-0 py-0 text-capitalize   font-weight-bold  text" onclick="location.href='{{url('/products/'.$product->id.'')}}';" style="font-size: 13px;line-height: 12px; cursor:pointer;" title = "{{$product->name}}">
                {{$product->name}}

               </div>
               <div class="col-12  my-0 py-0 " >

                <p class="card-text my-0 py-0 text-uppercase" >
                  <h6 style="font-size: 11px; color: #888;" class="text-capitalize my-0 py-0"> <strong >{{$product->category_name}}</strong> <br>  {{$product->author}}</h6></p>
               </div>
               <div class="col-12 my-0 py-0 d-flex align-items-end pl-2 ml-1">
                 @php
                     $var=false;
                     
                 @endphp
               @if (auth()->user())
                      @foreach ($collect_likes as $lik)
                      @if($lik==$product->id)
                      <a href="{{url('/like/'.$product->id.'')}}" class="btn btn-sm btn-primary like " ><i class="fas fa-thumbs-up fa-sm pr-1" style="color:#ddd;"></i><span class="badge badge-light con py-0  ">{{$product->lik}}</span></a>
                        @php
                            $var=true;
                            break;
                        @endphp
                      @endif
                    @endforeach
                    @if ($var!=true)
                    <a href="{{url('/like/'.$product->id.'')}}" class="btn btn-sm btn-dark like " ><i class="fas fa-thumbs-up fa-sm pr-1" style="color:#ddd;"></i><span class="badge badge-light con py-0  ">{{$product->lik}}</span></a>
                    @endif
                @else
                @if ($var!=true)
                <a href="{{ route('login') }}" class="btn btn-sm btn-dark like " ><i class="fas fa-thumbs-up fa-sm pr-1" style="color:#ddd;"></i><span class="badge badge-light con py-0  ">{{$product->lik}}</span></a>
                @endif
               @endif
               
            
            </div>
                
              

             
               
    
                
            </div>
            <div class="card-footer  text-center  mx-0 my-0 py-0 px-0 pb-0" >
               <a href="{{url('/products/'.$product->id.'')}}" class="btn mx-0 my-0 px-0 pt-1 pb-1 text-center" >  COP$ <span class="badge badge-warning" style="font-size: 16px;">{{$product->price}}</span></a>

               

             </div>
          </div>
        </div>
       @endforeach
    
     
         
      </div>
      <!-- /.row -->
       <div class="row  mb-5 my-4 ">
            <div class=" col">
                {{$products->links()}} 
            </div>
      </div>

      <!-- Features Section -->
      <div class="row ">
        <div class="col-lg-6">
          <h2>Modern Business Features</h2>
          <p>The Modern Business template by Start Bootstrap includes:</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4 ">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->
   
   <style type="text/css">
     .fe .num:hover{
      display:inline;
     
     }

     .fe .b{
      -webkit-box-shadow: 5px -5px 47px -11px rgba(0,0,0,0.75);
-moz-box-shadow: 5px -5px 47px -11px rgba(0,0,0,0.75);
box-shadow: 5px -5px 47px -11px rgba(0,0,0,0.75);
border-radius: 0%;
     }

     .fe button:hover{
       padding-right: 20px;
       
     }
     .fe a:hover{
       padding-right: 20px;
       
     }
.alert{
  animation: modal 1s  ease-in-out;
 
}
  @keyframes modal {
     0%  {  top: 0%; }
  
}
 
 .dropdown-menu {
    max-height: 260px;
    overflow: hidden;
    overflow-y: auto;
}
button.dropdown-toggle {
    position: relative;
}
button.dropdown-toggle::before {
    content: '';
    display: inline-block;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #CCC;
    border-bottom-color: rgba(0, 0, 0, 0.2);
    position: absolute;
    bottom: -2px;
    right: 7px;
    display: none;
}
button.dropdown-toggle::after {
    content: '';
    display: inline-block;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid white;
    position: absolute;
    bottom: -2px;
    right: 8px;
    z-index: 1001;
    display: none;
}
.open > button.dropdown-toggle::before,
.open > button.dropdown-toggle::after {
    display: block;
}









   </style>
   
  
@endsection
  
@section('scripts')

 <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>

 <!-- slick silder multi-imagenes-->
<script type="text/javascript" href="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript"  src="{{asset('slick/slick/slick.min.js')}}"></script>
 <script type="text/javascript">

   
    $(document).ready(function(){
  
    $('.autoplay').slick({slidesToShow:fun2(),slidesToScroll: 1,autoplay: true,autoplaySpeed: 2000,});
    });
    
function fun2(){
  var tama;

    if (screen.width<576) {
      return 2;
    }
    if (screen.width>=576 && screen.width <768){
        return 2;
    } if (screen.width>=768 && screen.width <992){
        return 3;
    } if (screen.width>=992 && screen.width <1200){
        return 6;
    }
    if (screen.width>=1200){
        return 6;
    }
}
  
  

 </script>
@endsection