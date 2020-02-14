@extends('layouts.app')
@section('title','tablas')
 @section('content')
 @include('layouts.notification') 

 <br>
     
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Libros</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row ">
                           <div class="col">

                               <a class="btn btn-warning" href="{{url('/admin/products/create')}}" role="button">Agregar</a>

                           </div>
                            
                            
                        </div>
                        <!-- /.panel-heading thead-dark-->
                        <hr>
                        <br>
                           <div class="table-responsive ">
                            <table  class="table table-bordered table-hover " id="">
                                <thead>
                                    <tr class=" shadow-md p-3 mb-5 bg-warning  rounded">
                                        <th>No.</th>
                                        <th>Nombre P.</th>
                                        <th>Categoria</th>
                                        <th>Editorial</th>
                                        <th>Precio_v</th>
                                        

                                        <th class="" style="padding-left: 100px; padding-right: 100px;"><center>Ajustes</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key=>$product)
                                    <tr class="odd gradeX">
                                        <td>{{($key+1)}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td>{{$product->editorial_name}}</td>
                                        <td>$ {{$product->price}}</td>
                                        <td class="text-center">
                                        

                                     
                                          

                                         
                                        
                                             <form method="post" action="{{url('/admin/products/'.$product->id.'/delete')}}" >
                                                {{csrf_field()}}

                                                  <a   title = "Info" class = "btn btn-dark  btn-sm " href="{{url('/products/'.$product->id.'')}}" role="button" target="_black"><i class = "fa fa-info" ></i></a>

                                                <a   title = "Imagen" class = "btn btn-info  btn-sm " href="{{url('/admin/products/'.$product->id.'/images')}}" role="button"><i class="far fa-images"></i></a>
                                            <a   title = "Editar"  class = "btn btn-success  btn-sm " href="{{url('/admin/products/'.$product->id.'/edit')}}" role="button"><i class = "fa fa-edit" ></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm"  title = "Eliminar" >

                                                <i class = "fa fa-times" ></i>
                                             </button>
                                             </form>
                                          
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- /.table-responsive -->
                           
        
                          {{$products->links()}} 
   
    <!-- /#wrapper -->

</div>
</div>

@endsection