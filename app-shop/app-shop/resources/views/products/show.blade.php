@extends('layouts.app')
@section('content')
@include('layouts.notification') 


         <div class="fixed-top fe "style=" z-index: 1; top: 45%; width:8%">
  @guest  
  @else
     @if (auth()->user()->cart->details->count()==0) 
      <a  class="btn btn-primary pl-1 b  " href="{{url('/home')}}">
  <span style="font-size: 19px; ">
            <i class = "fas fa-cart-plus" style=""></i>
      </span>
    </a>
    @else
         <a  class="btn btn-primary pl-1 b" href="{{url('/home')}}">
  <ruby><span style="font-size: 19px; ">
            <i class = "fas fa-cart-plus" style=""></i>
      </span><rt><span class="badge badge-light num ml-0" style="font-size: 10px; position:absolute; top: 20px;left: 20px  ">{{auth()->user()->cart->details->count()}}</span></rt></ruby>
    </a>
@endif
 @endguest

<br>
   <button type="button" class="btn btn-warning pl-1 b" >
  <span style="font-size: 19px;  ">
           <i class="far fa-comments"></i>
      </span>
</button>
    <br>
  
    <button type="button" class="btn btn-dark pl-2 b" data-toggle="modal" data-target="#exampleModalCenter1">
  <span style="font-size: 18px; color: #ffc107 ">
           <i class="fas fa-search"></i>
      </span>
</button>
   </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
             

            
              
            
      </div>
      
    </div>
  </div>
</div>
 <div class="container mt-2 mb-5 mt-5 ">
                                <div class="row ">
                                    <div class="col-12 col-lg-4 " >
                                        <div class="quickview_pro_img">
                                        	
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner i " style="height: 500px;">
    
     @foreach($imagesLeft as $image)
    <div class="carousel-item active">
     
                                            <img src="{{$image->url}}" alt="" class=" d-block w-100 card-img-top img-fluid shadow bg-white rounded " style="height: 500px;">
                                           
    </div>
     @endforeach
     @foreach($imagesRight as $image)
    <div class="carousel-item">
       
                                            <img src="{{$image->url}}" alt="" class="d-block w-100 card-img-top img-fluid shadow bg-white rounded " style="height: 500px;">
                                           
    </div>
     @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
                                        </div>
                                    </div>
                              
<div class="col-12 col-lg-8 text-center card  pl-0 pr-0 ">
<h3 class="card-header text-capitalize">{{$product->name}}</h3>
	<div class="row card-body">
		

		<div class="col-12 col-lg-6 pt-0 ml-0 mr-0">
			<h4 class="pt-1 pb-1">Detalles</h4><hr>
			<div class="text-left pb-2">
				<ul  class="detalles">
          <li> <span><i class="fas fa-user-circle"></i> Autor: </span> {{$product->author}}</li>
          <li><span><i class="fas fa-folder-open"></i> Categoria: </span>{{$product->category->name}}</li>
					<li><span><i class="fas fa-barcode"></i> ISBN: </span>{{$product->isbn}}</li>
					<li><span><i class="far fa-file-alt"></i> N° Páginas: </span>{{$product->num_pages}}</li>
					<li><span><i class="fas fa-book-reader"></i></span><a href=""data-toggle="modal" data-target="#exampleModalCenter">Descripción</a></li>
				</ul>
				
			</div>
			
		</div>
		<div class="col-12 col-lg-6  bg-white">
			<h4 class="pt-1 badge-warning badge-pill pb-1 ">cop $ {{$product->price}}</h4><hr>
			<div class="pb-2">
				<ul class="comp">
          @if ($product->quantity==0)
          <li><span class="badge badge-pill badge-danger">AGOTADO</span>  </li>    
          @else
          <li><span class="badge badge-pill badge-success">DISPONIBLE</span></li>
          @endif
					

					<form method="post" action="{{url('/cart')}}">
					 {{csrf_field()}}	
					<input type="hidden" name="product_id" value="{{$product->id}}">
					<input type="hidden" name="price" value="{{$product->price}}">
					<li class="li">
						<div class="row ">
							<div class="col pt-2 pb-0 ">
							<h5 class="text-center">Cantidad</h5>
						</div>

						<div class="col pt-1">
							<input type="number" placeholder="1" value="1" name="quantity" class="form-control " min="1" max="20"/>
						</div>
					</div>
						
						<!--<span class="input_spinner">
			     			 <button class="minus">-</button>
			      			<input type="text" placeholder="1" value="1" name="quantity" />
			      			<button class="plus">+</button>
						</span>-->
					</li>
					<br>
					<li >
						@guest
						<a class="btn btn-lg btn-success btn-block" href="{{ route('login') }}">Comprar ya</a>
						  <a  class="btn  btn-primary btn-block  " href="{{ route('login') }}"><i class = "fas fa-cart-plus" ></i> Añadir al carrito</a>
						@else
						<a class="btn btn-lg btn-success btn-block" href="#">Comprar ya</a>
						 <button type="sutmit" class="btn  btn-primary btn-block  "><i class = "fas fa-cart-plus" ></i> Añadir al carrito</button>
						@endguest
						
					</li>
					</form>
					<li >
						<img src="{{asset('images/paypal.png')}}" style="height: 70px;">
						
					</li>
				</ul>
				
			  


				
			</div>
			
		</div>
	</div>
  
  
</div>

                                </div>
                                @guest  
                                @else
                                 <div class="card row mt-3">
        <div class="card-header p-1 pl-3 "><h5>Agrega comentario</h5></div>
        <div class="card-body text-center p-1">
        <form method='POST' action="{{url('comment/create')}}">
             {{csrf_field()}}
             <div class="form-group p-1 m-0"> 
                <label class for="comment"></label>
             <textarea required name="body" id="comment" class="form-controll col-12 {{$errors->has('body')?'is-invalid':''}}" rows="1"  >{{old('body')}}</textarea>
             @if ($errors->has('body'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
             </span>
            @endif
                <input name="product_id" type="hidden" value="{{$product->id}}"/>
                
             </div>
            <button type="submit" class="btn btn-primary boton col-md-4 col-sm-2 col-xl-4" >Enviar</button>
        </form>
      </div>
    </div>
  
    @endguest
    <div class="card algo row">
    <div class="card-header bg-warning p-1 pl-3"><h5>Comentarios <span class="badge badge-primary badge-pill">{{$comments->count()}}</span></h5></div>
        @if($comments->count()==0)
            <div class="card-body">
                <h6 class="card-text">Este libro no tiene comentarios se el primero en hacerlo</h6>
            </div>
        @else
        <ul class="list-unstyled m-1">
            @foreach($comments as $comment)
            
               

                
                <li class="media mt-2 m-0">
                    <img class="img-responsive user-photo mr-3 m-0 " src="https://ssl.gstatic.com/accounts/ui/avatar_1x.png" style="border-radius:150px;
                    border:2px solid #666; width:50px;
    height:50px;" alt="...">
                    <div class="media-body m-0  " style="word-break: break-all;">
                        @if ($comment->user->id==auth()->user()->id)
                        <form method="post" action="{{url('/commentDelete/'.$comment->id.'')}}">
                          {{csrf_field()}}
                          <button type="submit" class="close" title="Eliminar" >
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                        @endif
                      <h5 class="mt-0 mb-1">{{$comment->user->name}} </h5>
                      {{$comment->body}}
                    </div>
                </li>
                 <hr>   
                  
            
            
            @endforeach
          </ul>
        @endif
   
    </div>        
                            </div>
                       
           
   

         



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="exampleModalCenterTitle">{{$product->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          {{$product->description}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>       
                      
  <style type="text/css">
     .fe .b{
      -webkit-box-shadow: 5px -5px 47px -11px rgba(0,0,0,0.75);
-moz-box-shadow: 5px -5px 47px -11px rgba(0,0,0,0.75);
box-shadow: 5px -5px 47px -11px rgba(0,0,0,0.75);
border-radius: 0%;
     }
  .li input {
  	width: 70px;

  }
  .li {
  	background: #ddd;
  	border-radius: 10px;
  	padding-top: 5px;
  	padding-left: 5px;
  }
  	.detalles li span {
  		color: #ff7400;
  		text-decoration: none;

  	}
  	 .detalles li span i{
  		padding-right: 8px;
  		color:#b5bdc8;
  	}
  	.detalles li{
  		padding-bottom: 0px;
  		list-style:none;
  		padding-left: 0px;
  		margin-left: 0px;
  	}
  	.comp li{
  		padding-bottom: 10px;
  		list-style:none;
  		padding-left: -2px;
  		margin-left: -30px;
  	}

  	.input_spinner {
    
    cursor: pointer;
}
    .input_spinner input {
        width: 70px;
        height: 30px;
        z-index: -1;
        border: 1px solid #dde4e9;
        text-align: center;
        font-size: 1.5em;
        
    }
    .input_spinner button {
        position: relative;
        width: 30px;
        height: 39px;
        border: none;
        color: #fff;
        padding: 0%;
        background: #ddd; 
        font-size: 1.5em;
        z-index: 1;
        outline: none;
        cursor: pointer;
        transition: all .25s; 
      
 }
 .input_spinner button:hover {
        position: relative;
        width: 32px;
        height: 41px;
        background: #888;     
 }

  
.minus._disabled {
    background: #FEA68C;
    
  
}
.minus._disabled:hover{
    background: #FEA68C;
    
  
}
.plus._disabled {
    background: #FEA68C;
}
.plus._disabled:hover {
    background: #FEA68C; 
}
.i{
	-webkit-box-shadow: 0px 20px 50px 0px rgba(0,0,0,0.26);
-moz-box-shadow: 0px 20px 50px 0px rgba(0,0,0,0.26);
box-shadow: 0px 20px 50px 0px rgba(0,0,0,0.26);

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

 <--! comentario-->
 .algo{
        margin-top:15px;
    }
    .comment-box {
    margin-top: 30px !important;
    }
    /* CSS Test end */

    .comment-box img {
        width: 50px;
        height: 50px;
    }
    .comment-box .media-left {
        padding-right: 10px;
        width: 65px;
    }
    .comment-box .media-body p {
        border: 1px solid #ddd;
        padding: 10px;
    }
    .comment-box .media-body .media p {
        margin-bottom: 0;
    }
    .comment-box .media-heading {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        padding: 7px 10px;
        position: relative;
        margin-bottom: -1px;
    }
    .comment-box .media-heading:before {
        content: "";
        width: 12px;
        height: 12px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-width: 1px 0 0 1px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        position: absolute;
        top: 10px;
        left: -6px;
    }
  </style> 
  <script language="JavaScript"> 
var seconds = 1;  // 
var input = document.querySelector('input');
var plus = document.querySelector('.plus');
var minus = document.querySelector('.minus');
var total = 1; 
var step = 1; 
    
plus.addEventListener('click', Increase);
minus.addEventListener('click', Decrease);

// Functions
function Increase(e) {
	if ( input.value<=20) {
		   e.preventDefault();
    total += step;
    input.value = total; 

    if(input.value > 1 ){
       minus.disabled = false; 
      minus.classList.remove('_disabled');
    }

	}
	if (input.value==20) {
		
		  plus.disabled = true; 
      	plus.classList.add('_disabled');
      	input.value = 20;
	}
console.log(input.value);
}

function Decrease(e) {
    e.preventDefault; 
    total -= step; 
    input.value = total;
    
    if(input.value < 1 || input.value == 1) {
        minus.disabled = true;
        minus.classList.add('_disabled');
        input.value = 1;
    } 
     plus.disabled = false;
     plus.classList.remove('_disabled');
     console.log(input.value);
}

  




</script>                   

@endsection