@extends('layouts.app')
@section('title','tablas')
 @section('content')
 {{-- @include('layouts.alert') --}}
 
 <br>
     
            
            <!-- /.row -->
<div class="content mb-5">


<form method="post" action="{{url('/admin/products')}}">
    {{csrf_field()}}
<div class="card ">
  <div class="card-header text-center">
    <h1 class="page-header">Crear Producto</h1>
  </div>

<div class="card-body">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail1">Nombre del libro</label>
      <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nombre del libro" name="name" value="{{ old('name') }}" required autofocus>
      @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
   
     <div class="form-group col-md-6">
      <label for="category->id">Categoria</label>
      <select class="form-control{{ $errors->has('category->id') ? ' is-invalid' : '' }}" name="category_id"  required autofocus>
        @foreach($categories as $category)
        <option value="{{$category->id}}" @if($category->id==old('category_id')) selected @endif>{{$category->name}}</option>
        @endforeach
      </select>
      @if ($errors->has('category->id'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('category->id') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="author">Autor</label>
      <input type="text" class="form-control {{$errors->has('author')?'is-invalid':''}}" id="author" placeholder="Nombre del libro" name="author" required autofocus value="{{old('author')}}">
      @if ($errors->has('author'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('author') }}</strong>
      </span>
      @endif
      </div>
     
       <div class="form-group col-md-6">
        <label for="editorial_id">Editorial</label>
        <select  id="editorial_id" class="form-control {{ $errors->has('editorial_id') ? ' is-invalid' : '' }}" name="editorial_id"  required autofocus >
          @foreach($editorials as $editorial)
          <option value="{{$editorial->id}}" @if($editorial->id==old('editorial_id')) selected @endif>{{$editorial->name}}</option>
          @endforeach
        </select>
        @if ($errors->has('editorial_id'))
           <span class="invalid-feedback" role="alert">
             <strong>{{ $errors->first('editorial_id') }}</strong>
          </span>
        @endif
      </div>
  
  
  
    </div>
 
  <div class="form-row">
      <div class="form-group col-md-6">
          <label for="isbn">ISBN</label>
          <input type="number" class="form-control {{ $errors->has('isbn') ? ' is-invalid' : '' }}" id="isbn" placeholder="ISBN" name="isbn" required autofocus value="{{old('isbn')}}">
          @if ($errors->has('isbn'))
           <span class="invalid-feedback" role="alert">
             <strong>{{ $errors->first('isbn') }}</strong>
           </span>
         @endif
      </div>
      <div class="form-group col-md-6">
            <label for="num_pages">Numero de paginas</label>
            <input type="number" class="form-control{{ $errors->has('num_pages') ? ' is-invalid' : '' }}" id="num_pages" placeholder="Numero de paginas" name="num_pages" required autofocus value="{{old('num_pages')}}">
            @if ($errors->has('num_pages'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('num_pages') }}</strong>
              </span>
             @endif
      </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
          <label for="price">Precio de venta</label>
          <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" placeholder="Precio" name="price" required autofocus value="{{old('price')}}">
          @if ($errors->has('price'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
              </span>
             @endif
        </div>
        <div class="form-group col-md-6">
            <label for="price_purchase">Precio de compra</label>
            <input type="text" class="form-control {{ $errors->has('price_purchase') ? ' is-invalid' : '' }}" id="price_purchase" placeholder="Precio de compra" name="price_purchase" required autofocus value="{{old('price_purchase')}}">
            @if ($errors->has('price_purchase'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('price_purchase') }}</strong>
              </span>
             @endif
        </div>
  </div>

  <div class="form-row">
         <div class="form-group col-md-6">
            <label for="quantity">Cantidad</label>
            <input required autofocus value="{{old('quantity')}}"type="number" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" id="quantity" placeholder="Cantidad" name="quantity">
            @if ($errors->has('quantity'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('quantity') }}</strong>
            </span>
           @endif
         </div>
        <div class="form-group col-md-6">
            <label for="discount">Descuento</label>
            <input  required autofocus value="{{old('discount')}}" type="number" max="100" class="form-control {{ $errors->has('discount') ? ' is-invalid' : '' }}" id="discount" placeholder="Descuento" name="discount" >
            @if ($errors->has('discount'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('discount') }}</strong>
              </span>
             @endif
        </div>

   </div>

  <div class="form-group">
    <label for="inputCity">Descripcion</label>
    <textarea required autofocus type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description"  rows="5" name="description"  placeholder="Descripcion">{{old('description')}}</textarea>
    @if ($errors->has('description'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
              </span>
     @endif
  </div>
  <center>
     <a class="btn btn-danger" href="{{url('/admin/products')}}" role="button">Cancelar</a>
     <button type="submit" class="btn btn-warning">Crear</button>
  </center>
   </div>
   </div>
</form>
</div>

<script>
  const number = document.getElementById('price');
  const number2 = document.getElementById('price_purchase');
  
  function formatNumber (n) {
  
    n = String(n).replace(/\D/g, "");
  
    return n === '' ? n : Number(n).toLocaleString();
  
  }
  
  number.addEventListener('keyup', (e) => {
    const element = e.target;
  
    const value = element.value;
    element.value = formatNumber(value);
  
  
  });
  number2.addEventListener('keyup', (e) => {
    const element = e.target;
  
    const value = element.value;
    element.value = formatNumber(value);
  
  
  });
  </script>

@endsection