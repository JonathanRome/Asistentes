@extends('layouts.app')

@section('content')
 <?php use \App\Http\Controllers\CategoryController;?>
<div class="container">
    <div class="card card-container">
        <div class="">
            <div class="">
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
       <p id="profile-name" class="profile-name-card">Registrate</p>
<br>    
                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">

                            <div class="col-6">
                                <input id="name" placeholder="Nombre" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                              <div class="col-6">
                                <input id="cc" placeholder="Cedula" type="number" class="form-control{{ $errors->has('cc') ? ' is-invalid' : '' }}" name="cc" value="{{ old('cc') }}" required autofocus>

                                @if ($errors->has('cc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <br>
                        <div class="row">
                            

                            <div class="col-12">
                                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                             
                        </div>
                        <br>    
                           <div class="row">
                            

                              <div class="col-12">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#exampleModalCenter">
                                  Elige tus categorias
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Elige tus categorias favoritas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                            <?php $categorys=CategoryController::index();
                                            
                                            ?>
                                            @foreach ($categorys as $category)
                                            <div class="custom-control custom-checkbox ">
                                              <input type="checkbox" class="custom-control-input" id="{{$category->id}}"  value="{{$category->id}}" name="categorias[]">
                                              <label class="custom-control-label col-12 dropdown-item" for="{{$category->id}}">{{$category->name}}</label>
                                            </div>
                                            @endforeach
                                           
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                         <br>
                        <div class="row">
                               <div class="col-6">
                                <input id="tel_1" placeholder="Celular" type="number" class="form-control{{ $errors->has('tel_1') ? ' is-invalid' : '' }}" name="tel_1" value="{{ old('tel_1') }}" required autofocus>

                                @if ($errors->has('tel_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                               <div class="col-6">
                                <input id="tel_2" placeholder="Celular 2 (opcional)" type="number" class="form-control{{ $errors->has('tel_2') ? ' is-invalid' : '' }}" name="tel_2" value="{{ old('tel_2') }}"  autofocus>

                                @if ($errors->has('tel_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel_2') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                         <br>
                          <div class="row">
                            

                            <div class="col-6">
                                <input id="city" placeholder="Ciudad donde recides" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                              <div class="col-6">
                                <input id="address" placeholder="Dirección" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class=" row">
                            

                            <div class="col-6">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-6">
                                <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                         <br>


                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>

/*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
    background-repeat: no-repeat;
 
}

.card-container.card {
    max-width: 700px;
    padding: 27px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #E75D2A;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: #343a40;
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: #ffc107;
}

.forgot-password {
    color: #E75D2A;
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: #ffc107;
}


</style>

