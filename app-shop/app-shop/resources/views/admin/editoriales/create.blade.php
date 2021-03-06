@extends('layouts.app')

@section('title','tablas')
 @section('content')
 
 {{-- @include('layouts.alert') --}}
 
 <br>
     
            
            <!-- /.row -->
<div class="content mb-5">


    <form method="post" action="{{url('/admin/editoriales/')}}">
      {{csrf_field()}}
  <div class="card ">
    <div class="card-header text-center">
      <h1 class="page-header">Crear Editorial</h1>
    </div>
  
  <div class="card-body">
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nombre de editoriales</label>
        <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" id="inputEmail4" placeholder="Nombre de editoriales" name="name" value="{{old('name')}}">
      @if ($errors->has('name'))
        
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
          
      @endif
      </div>
      <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" id="inputEmail4" placeholder="Email" name="email" value="{{old('email')}}">
          @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
  </div>
  </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Telefono</label>
          <input type="number" class="form-control {{$errors->has('tel')?'is-invalid':''}}" id="inputEmail4" placeholder="Telefono" name="tel" value="{{old('tel')}}">
          @if ($errors->has('tel'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('tel') }}</strong>
            </span>
          @endif
        </div>
      </div>
   
      <div class="form-group">
         
            <label for="inputCity">Nota</label>
            <textarea type="text" class="form-control {{$errors->has('nota')?'is-invalid':''}}" id="inputCity"  rows="5" name="nota"  placeholder="Nota">{{old('nota')}}</textarea>
            @if ($errors->has('nota'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('nota') }}</strong>
            </span>
          @endif
  
      </div>
     
    
    
    <center>
       <a class="btn btn-danger" href="{{url('/admin/editoriales')}}" role="button">Cancelar</a>
      <button type="submit" class="btn btn-warning">Guardar</button>
  
  
  
    </center>
     </div>
     </div>
  </form>
</div>

@endsection