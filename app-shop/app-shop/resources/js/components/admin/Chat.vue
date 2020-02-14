<template>
      <div class="row justify-content-center h-100 ">
        <div class="col-md-3 "><div class="card cardc mb-sm-3 mb-md-0  contacts_card contacts_cardc">
          <div class="card-header  card-headerc">
            <div class="input-group">
              <input type="text" placeholder="Search..." name="" class="form-control search searchc">
              <div class="input-group-prepend">
                <span class="input-group-text search_btn search_btnc"><i class="fas fa-search"></i></span>
              </div>
            </div>
          </div>
          <div class="card-body card-bodyc contacts_body contacts_bodyc">
            <ul class="contacts contactsc">
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont img_contc">
                  <img src="//ssl.gstatic.com/accounts/ui/avatar_1x.png" class="rounded-circle user_img user_imgc p-0">
                
                </div>
                <div class="user_info user_infoc p-0 ml-0">
                  <span>Khadija Mehr</span>
                  <p>Khadija left 50 mins ago</p>
                  
                </div>
              </div>
            </li>
            </ul>
          </div>
        </div></div>
        <div class="col-md-9 ">
          <div class="card cardc">
            <div class="card-header card-headerc msg_head msg_headc">
              <div class="d-flex bd-highlight">
                
                <div class="user_info user_infoc">
                  <span>Chat with Maryam Naz</span>
                  <p>1767 Messages</p>
                </div>
              </div>
              <span id="action_menu_btn action_menu_btnc"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu action_menuc">
                <ul>
                  <li><i class="fas fa-user-circle"></i> View profile</li>
                  <li><i class="fas fa-users"></i> Add to close friends</li>
                  <li><i class="fas fa-plus"></i> Add to group</li>
                  <li><i class="fas fa-ban"></i> Block</li>
                </ul>
              </div>
            </div>
            <div class="card-body card-bodyc msg_card_body msg_card_bodyc">
          
              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg img_cont_msgc">
                  <img src="//ssl.gstatic.com/accounts/ui/avatar_1x.png" class="rounded-circle user_img_msg user_img_msgc">
                </div>
                <div class="msg_cotainer msg_cotainerc">
                  I am looking for your next templates
                  <span class="msg_time msg_timec">9:07 AM, Today</span>
                </div>
              </div>
              <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send msg_cotainer_sendc">
                  Ok, thank you have a good day
                  <span class="msg_time_send msg_time_sendc">9:10 AM, Today</span>
                </div>
                <div class="img_cont_msg img_cont_msgc">
                    <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="rounded-circle user_img_msg user_img_msgc">
                </div>
              </div>
              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg img_cont_msgc">
                  <img src="//ssl.gstatic.com/accounts/ui/avatar_1x.png" class="rounded-circle  user_img_msg user_img_msgc">
                </div>
                <div class="msg_cotainer msg_cotainerc">
                  Bye, see you
                  <span class=" msg_time msg_timec">9:12 AM, Today</span>
                </div>
              </div>
            </div>
            <div class="card-footer card-footerc" style="background-color: rgba(93, 15, 57);">
              <div class="input-group" >
                <textarea name="" class="form-control type_msg type_msgc"  placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                  <span class="input-group-text send_btn send_btnc"><i class="fas fa-location-arrow"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style >
body,html{
    height: 100%;
    margin: 0;
    background: #7F7FD5;
       background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
  }

  .chat{
    margin-top: auto;
    margin-bottom: auto;
  }
  .cardc{
    height: 500px;
    border-radius: 15px solid  rgba(255, 87, 51) ;
    background-color: rgba(60, 46, 54);
  }
  .contacts_bodyc{
    padding:  0.75rem 0 !important;
    overflow-y: auto;
    white-space: nowrap;
  }
  .msg_card_bodyc{
    overflow-y: auto;
  }
  .card-headerc{
    border-radius: 15px 15px 0 0 !important;
    border-bottom: 0 !important;
    background-color: rgba(93, 15, 57);
    
  }
 .card-footerc{
  border-radius: 0 0 15px 15px !important;
    border-top: 0 !important;
}
  .containerc{
    align-content: center;
  }
  .searchc{
    border-radius: 15px 0 0 15px !important;
    border:0 !important;
    color:black !important;
  }
  .searchc:focus{
       box-shadow:none !important;
         outline:0px !important;
  }
  .type_msgc{
    
    border:0 !important;
    color:black !important;
    height: 40px !important;
    overflow-y: auto;
  }
    .type_msgc:focus{
       box-shadow:none !important;
         outline:0px !important;
  }
  .attach_btnc{
border-radius: 15px 0 0 15px !important;
background-color: rgba(255, 87, 51) !important;
    border:0 !important;
    color: white !important;
    cursor: pointer;
  }
  .send_btnc{
border-radius: 0 15px 15px 0 !important;
background-color: rgba(0,0,0,0.3) !important;
    border:0 !important;
    color: white !important;
    cursor: pointer;
  }
  .search_btnc{
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0,0,0,0.3) !important;
    border:0 !important;
    color: white !important;
    cursor: pointer;
  }
  .contactsc{
    list-style: none;
    padding: 0;
  }
  .contactsc li{
    width: 100% !important;
    padding: 5px 10px;
    margin-bottom: 15px !important;
  }
.activec{
    background-color: rgba(0,0,0,0.3);
}
  .user_imgc{
    height: 50px;
    width: 50px;
    border:1.5px solid #f5f6fa;
  
  }
  .user_img_msgc{
    height: 30px;
    width: 30px;
    border:1.5px solid #f5f6fa;
  
  }
.img_contc{
    position: relative;
    height: 70px;
    width: 70px;
}
.img_cont_msgc{
    height: 40px;
    width: 40px;
}
/* .online_icon{
  position: absolute;
  height: 10px;
  width:10px;
  background-color: #4cd137;
  border-radius: 50%;
  bottom: 0.2em;
  right: 0.4em;
  border:1.5px solid white;
} */
.offlinec{
  background-color: #c23616 !important;
}
.user_infoc{
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 15px;
}
.user_infoc span{
  font-size: 20px;
  color: white;
}
.user_infoc p{
font-size: 10px;
color: rgba(255,255,255,0.6);
}
.video_camc{
  margin-left: 50px;
  margin-top: 5px;
}
.video_camc span{
  color: white;
  font-size: 20px;
  cursor: pointer;
  margin-right: 20px;
}
.msg_cotainerc{
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 10px;
  border-radius: 25px;
  background-color: #82ccdd;
  padding: 10px;
  position: relative;
  color: black;
}
.msg_cotainer_sendc{
  margin-top: auto;
  margin-bottom: auto;
  margin-right: 10px;
  border-radius: 25px;
  background-color: #78e08f;
  padding: 10px;
  position: relative;
  color: black;
}
.msg_timec{
  position: absolute;
  left: 0;
  bottom: -15px;
  color: rgba(255,255,255,0.5);
  font-size: 10px;
}
.msg_time_sendc{
  position: absolute;
  right:0;
  bottom: -15px;
  color: rgba(255,255,255,0.5);
  font-size: 10px;
}
.msg_headc{
  position: relative;
}
#action_menu_btnc{
  position: absolute;
  right: 10px;
  top: 10px;
  color: white;
  cursor: pointer;
  font-size: 20px;
}
.action_menuc{
  z-index: 1;
  position: absolute;
  padding: 15px 0;
  background-color: rgba(0,0,0,0.5);
  color: white;
  border-radius: 15px;
  top: 30px;
  right: 15px;
  display: none;
}
.action_menuc ul{
  list-style: none;
  padding: 0;
margin: 0;
}
.action_menuc ul li{
  width: 100%;
  padding: 10px 15px;
  margin-bottom: 5px;
}
.action_menuc ul li i{
  padding-right: 10px;

}
.action_menuc ul li:hover{
  cursor: pointer;
  background-color: rgba(0,0,0,0.2);
}
@media(max-width: 576px){
.contacts_cardc{
  margin-bottom: 15px !important;
}
}
</style>
