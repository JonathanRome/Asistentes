@extends('layouts.app')

@section('content')
@include('layouts.notification')     
<div class="container mt-5 mb-5">
   
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="page-header">Tablero</h1>
                </div>

                <div class="card-body">
                   
                      <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class = "fas fa-cart-plus" ></i><span class="badge badge-light">{{auth()->user()->cart->details->count()}}</span> Mi carrito</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-ambulance"></i><span class="badge badge-light">{{auth()->user()->car->count()}}</span>Pedidos</a>
                           
                          </div>
                    </nav>
                        <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                
                               
                          <div class="table-responsive ">
                            <table  class="table table-hover" id="">
                                <thead>
                                    <tr class=" shadow-md p-3 mb-5 bg-warning  rounded text-center">
                                        <th class="px-0 ">Imagen</th>
                                        <th>Nombre</th>
                                        <th class="px-4">Precio</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal</th>
                                        <th class="" style="padding-left: 50px; padding-right: 50px;">Ajustes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(auth()->user()->cart->details as $detail)
                                    <tr class="odd gradeX text-center">
                                        <td class="px-0 py-1"><img src="{{$detail->product->featured_image_url}}" style="height: 60px; padding: 0%; width: 45px;"></td>
                                        <td><a href="{{url('/products/'.$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a></td>
                                        <td>$ {{$detail->price_detail}}</td>
                                         <td>{{$detail->quantity}}</td>
            
                                         <td>$ {{$detail->quantity*$detail->price_detail}}</td>
                                        <td class="text-center">
                                             <form method="post" action="{{url('/cartDelete')}}" >
                                                {{csrf_field()}}
                                                  <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                                  <a   title = "Info" class = "btn btn-dark  btn-sm " href="{{url('/products/'.$detail->product->id)}}" target="_blank" role="button"><i class = "fa fa-info" ></i></a>
                                            
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
                             <center>
                            <div  class="row-11">
                              <div class="col-12 bg-warning mb-3">
                                <strong>TOTAL :
                                  <?php $total = 0; ?>
                                  @foreach(auth()->user()->cart->details as $detail)
                                  
                                  <?php $total+=$detail->quantity*$detail->product->price;?>
                                  @endforeach
                                  $ {{$total}}
                                </strong>
                              </div>
                              <div class="col-6">
                                <form method="post" action="{{url('/order')}}">
                                   
                                    {{csrf_field()}} 
                                @if($total==0)

                                <a type="" class="btn  bg-danger btn-block text-light">Realizar Pedido</a>

                                @else
                                 <button type="sutmit" class="btn  btn-success btn-block  ">Realizar Pedido</button>
                                 @endif
                              </form>
                              <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                                      <input name="merchantId"    type="hidden"  value="508029"   >
                                      <input name="accountId"     type="hidden"  value="512321" >
                                      <input name="description"   type="hidden"  value="VENTA EN LINEA PAYU"  >
                                      <input name="referenceCode" type="hidden"  value="TestPayU" >
                                      <input name="amount"        type="hidden"  value="50000"   >
                                      <input name="tax"           type="hidden"  value="3193"  >
                                      <input name="taxReturnBase" type="hidden"  value="16806" >
                                      <input name="currency"      type="hidden"  value="COP" >
                                      <input name="signature"     type="hidden"  value="a8168cb636341ca3f64d5f5db772c82d"  >
                                      <input name="test"          type="hidden"  value="1" >
                                      <input name="buyerEmail"    type="hidden"  value="test@test.com" >
                                      <input name="responseUrl"    type="hidden"  value="http://www.test.com/response" >
                                      <input name="confirmationUrl"    type="hidden"  value="http://www.test.com/confirmation" >
                                      <input name="Submit"        type="submit"  value="Enviar" >
                                    </form>
                              </div>
                            </div>
                            </center>
                              </div>
                              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                                     <div class="table-responsive ">
                            <table  class="table table-hover " id="">
                                <thead>
                                    <tr class=" shadow-md p-3 mb-5 bg-warning  rounded text-center">
                                        <th class="px-0 ">Imagen</th>
                                        <th style="padding-left: 20px; padding-right: 20px;">Nombre</th>
                                        <th  style="padding-left: 90px; padding-right: 90px;">Precio</th>
                                        <th>Cantidad</th>
                                        <th style="padding-left: 40px; padding-right: 40px;">SubTotal</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               @foreach(auth()->user()->car as $cart)
                                    @foreach($cart->details as $detail)
                                    <tr class="odd gradeX text-center">
                                        <td class="px-0 py-1"><img src="{{$detail->product->featured_image_url}}" style="height: 60px; padding: 0%; width: 45px;"></td>
                                        <td><a href="{{url('/products/'.$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a></td>
                                        <td>$ {{$detail->price_detail}}</td>
                                         <td>{{$detail->quantity}}</td>
                                         <td>$ {{$detail->quantity*$detail->price_detail}}</td>
                                          
                                    </tr>

                                       @endforeach
                                      <tr>
                                        <td class="bg-success text-center  "></td>
                                        <td  class="bg-success text-center  " >
                                          

                                      
                                        </td>
                                        <td class="bg-success text-center  " style="color: white">
                                          <strong>Fecha: </strong>
                                          <?php
                                              $date = new DateTime($cart->updated_at);
                                              echo $date->format('d/m/Y');
                                              ?>
                                        </td>
                                        <td class="bg-success text-center  " style="color: white"><strong>{{$cart->status}}</strong></td>

                                        <td class="bg-success text-center  " style="color: white">
                                               <?php $total = 0; ?>
                                  @foreach($cart->details as $detail)
                                  
                                  <?php $total+=$detail->quantity*$detail->price_detail;?>
                                  @endforeach
                                      <strong >Total: </strong>${{$total}}

                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           

                            </div>

                                 


                              </div>
                                                      </div>


                </div>

            </div>
       

      
</div>
<style type="text/css">

  .alert{
  animation: modal 1s  ease-in-out;
}
  @keyframes modal {
     0%  {  top: 0%; }
  
}
</style>
@endsection
