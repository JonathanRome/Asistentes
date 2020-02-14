@extends('layouts.app')
@section('title','tablas')
 @section('content')
 @include('layouts.notification') 
 <br>
     
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Categorias</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row ">
                           <div class="col">

                               <a class="btn btn-warning" href="{{url('/admin/categories/create')}}" role="button">Agregar</a>

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
                                        <th>Nombre</th>
                                        <th>Descripcón</th>
                    

                                        <th class="" style="padding-left: 100px; padding-right: 100px;"><center>Ajustes</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key=>$category)
                                    <tr class="odd gradeX">
                                        <td>{{($key+1)}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        
                                        <td class="text-center">
                                        

                                     
                                          

                                         
                                        
                                             <form method="post" action="{{url('/admin/categories/'.$category->id.'/delete')}}" >
                                                {{csrf_field()}}

                                            
                                            <a   title = "Editar"  class = "btn btn-success  btn-sm " href="{{url('/admin/categories/'.$category->id.'/edit')}}" role="button"><i class = "fa fa-edit" ></i></a>
                                                    @if ($category->id != 1)
                                                    <button type="submit" class="btn btn-danger btn-sm"  title = "Eliminar" >
                                                   
                                                <i class = "fa fa-times" ></i>

                                             </button>
                                              @endif
                                             </form>
                                          
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- /.table-responsive -->
                           
        
                          {{$categories->links()}} 
   
    <!-- /#wrapper -->

</div>
</div>

@endsection