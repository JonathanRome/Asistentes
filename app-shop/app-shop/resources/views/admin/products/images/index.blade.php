@extends('layouts.app')
@section('title','tablas')
 @section('content')
 
 <br>
     
<div class="row mb-5">
    <div class="col-lg-12 text-center">
            <h1 class="page-header">Imagenes del libro "{{$product->name}}"</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
                    
        
            
                <form method="post" action="{{url('/admin/products/'.$product->id.'/image')}}" enctype="multipart/form-data" class="row">
                    {{csrf_field()}}
                    
                    <div class="custom-file col-md-4 mb-2">
                          {{-- <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                         <input type="file" class="custom-file-input " id="image" lang="es" name="photo[]" required multiple> --}}
                         <input type="file" id="explorador"  class="custom-file-input    inp" lang="es" name="photo[]" required multiple accept="image/png, .jpeg, .jpg, image/gif"> 
                         <input type="text" id="explo_caja" class="custom-file-label   inp" value="Seleccionar Archivo"> 

                           
                    </div>
                    <div class="col-md-4 mb-2">
                            <button class="btn btn-warning w-100" type="submit">Subir nueva imagen </button>
                    </div>
                    <div class="col-md-4 mb-2">
                            <a class="btn btn-dark w-100" href="{{url('/admin/products')}}" role="button">Volver al listado de productos</a>
                    </div>
                            
                    
                     
                    
                   
                </form>
                
                
           

            
                            
        
        <hr>
                        <!-- /.panel-heading thead-dark-->
<br>
                 <div class="row">
                
                    
                       @foreach ($images as $image)
                        <div class="col-lg-2 col-md-3 col-sm-4  portfolio-item ">
                 <div class="card text-center  h-100" >
                      <div class="card-body  pt-0 px-0">
                         <img src="{{$image->url}}" class=" card-img-top img-fluid" style="height: 220px;"alt="Responsive image">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>

                        <form method="post" action="{{url('/admin/products/'.$product->id.'/ima')}}" >
                            {{csrf_field()}}
                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <button type="submit" class="btn btn-danger btn-sm"  title="Eliminar" >Eliminar</button>

                            @if ($image->featured)
                                <button type="button" class="btn btn-success px-1 py-0 float-left ml-2 mr-0"  title="Imagen destacada de este libro" ><i class="far fa-heart"></i></button>

                            @else
                                <a  href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id.'')}}" class="btn btn-outline-success px-1 py-0 float-left ml-2 mr-0" title="Destacado"><i class="far fa-heart"></i></a>
                            @endif
                        </form>
                      </div>
                </div>  
                </div>
       
                @endforeach
                              

                 </div>
                
    <!-- /#wrapper -->
  
    </div>
</div>
<script> 
        elExplo=document.getElementById("explorador"); 
        elExplo_caja=document.getElementById("explo_caja"); 
        elExplo.onchange=function() { 
            elExplo.click(); 
            elExplo_caja.value=elExplo.value; 
        } 
        </script>
        <style>
        .inp{
            width: 70%;
            margin-left: 5%;
        }
        
        </style> 
  
@endsection
