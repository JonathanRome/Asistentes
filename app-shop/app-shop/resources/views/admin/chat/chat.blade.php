@extends('admin.admin')
@section('content')
       
      <div class="row">
         <div class="col-6">


         </div>
         <div class="col-6">
           
         </div>
      </div>
      <div class="row justify-content-center h-100 ">
        <div class="col-md-3 "><div class="card mb-sm-3 mb-md-0 contacts_card">
          <div class="card-header ">
            <div class="input-group">
              <input type="text" placeholder="Search..." name="" class="form-control search">
              <div class="input-group-prepend">
                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
              </div>
            </div>
          </div>
          <div class="card-body contacts_body ">
            <ul class="contacts">
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="//ssl.gstatic.com/accounts/ui/avatar_1x.png" class="rounded-circle user_img p-0">
                  {{-- <span class="online_icon offline"></span> --}}
                </div>
                <div class="user_info p-0 ml-0">
                  <span>Khadija Mehr</span>
                  <p>Khadija left 50 mins ago</p>
                </div>
              </div>
            </li>
            </ul>
          </div>
        </div></div>
        <div class="col-md-9 ">
          <div class="card">
            <div class="card-header msg_head">
              <div class="d-flex bd-highlight">
                {{-- <div class="img_cont">
                  <img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div> --}}
                <div class="user_info">
                  <span>Chat with Maryam Naz</span>
                  <p>1767 Messages</p>
                </div>
              </div>
              <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu">
                <ul>
                  <li><i class="fas fa-user-circle"></i> View profile</li>
                  <li><i class="fas fa-users"></i> Add to close friends</li>
                  <li><i class="fas fa-plus"></i> Add to group</li>
                  <li><i class="fas fa-ban"></i> Block</li>
                </ul>
              </div>
            </div>
            <div class="card-body msg_card_body">
          
              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                  <img src="//ssl.gstatic.com/accounts/ui/avatar_1x.png" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                  I am looking for your next templates
                  <span class="msg_time">9:07 AM, Today</span>
                </div>
              </div>
              <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                  Ok, thank you have a good day
                  <span class="msg_time_send">9:10 AM, Today</span>
                </div>
                <div class="img_cont_msg">
                    <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="rounded-circle user_img_msg">
                </div>
              </div>
              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                  <img src="//ssl.gstatic.com/accounts/ui/avatar_1x.png" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                  Bye, see you
                  <span class="msg_time">9:12 AM, Today</span>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: rgba(93, 15, 57);">
              <div class="input-group" >
                <textarea name="" class="form-control type_msg"  placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                  <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    



@endsection
@section('css')
    <link href="{{asset('css/chat.css')}}" rel="stylesheet">
@endsection