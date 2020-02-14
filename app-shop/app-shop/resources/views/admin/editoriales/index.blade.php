@extends('layouts.app')
@section('title','tablas')
 @section('content')
 @include('layouts.notification') 
 <br>
     
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Editoriales</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row ">
                           <div class="col">

                               <a class="btn btn-warning" href="{{url('/admin/editoriales/create')}}" role="button">Agregar</a>

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
                                        <th>Email</th>
                                        <th>Tel</th>
                                        <th>Nota</th>
                    

                                        <th class="" style="padding-left: 100px; padding-right: 100px;"><center>Ajustes</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($editoriales as $key=>$editorial)
                                    <tr class="odd gradeX">
                                        <td>{{($key+1)}}</td>
                                        <td>{{$editorial->name}}</td>
                                        <td>{{$editorial->email}}</td>
                                        <td>{{$editorial->tel}}</td>
                                        <td>{{$editorial->nota}}</td>
                                        
                                        <td class="text-center">
                                        

                                     
                                          

                                         
                                        
                                             <form method="post" action="{{url('/admin/editoriales/'.$editorial->id.'/delete')}}" >
                                                {{csrf_field()}}

                                            
                                            <a   title = "Editar"  class = "btn btn-success  btn-sm " href="{{url('/admin/editoriales/'.$editorial->id.'/edit')}}" role="button"><i class = "fa fa-edit" ></i></a>
                                                    @if ($editorial->id != 1)
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
                           
        
                          {{$editoriales->links()}} 
   
    <!-- /#wrapper -->

</div>
</div>

@endsection