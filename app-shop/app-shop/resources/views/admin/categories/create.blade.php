@extends('layouts.app')

@section('title','tablas')
 @section('content')
 
 {{-- @include('layouts.alert') --}}
 
 <br>
     
            
            <!-- /.row -->
<div class="content mb-5">


<form method="post" action="{{url('/admin/categories')}}">
    {{csrf_field()}}
<div class="card ">
  <div class="card-header text-center">
    <h1 class="page-header">Crear Categoria</h1>
  </div>

<div class="card-body">
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Nombre de categoria</label>
    <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" id="inputEmail4" placeholder="Nombre de editoriales" name="name" value="{{old('name')}}">
  @if ($errors->has('name'))
    
  <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('name') }}</strong>
  </span>
      
  @endif
  </div>

  </div>
  <div class="form-group">
      <label for="inputCity">Descripcion</label>
     <textarea type="text" class="form-control{{$errors->has('description')?'is-invalid':''}}" id="inputCity"  rows="5" name="description"  placeholder="Descripcion">{{old('description')}}</textarea>
     @if ($errors->has('description'))
    
     <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('description') }}</strong>
     </span>
         
     @endif
    </div>
  
 
   
   
  
  
  <div class="text-center">
     <a class="btn btn-danger" href="{{url('/admin/categories')}}" role="button">Cancelar</a>
    <button type="submit" class="btn btn-warning">Crear</button>



  </div>
   </div>
   </div>
</form>
</div>
@endsection