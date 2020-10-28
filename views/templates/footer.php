<style>
.service {
    display: flex;
    align-items: center;
    background-repeat: repeat-x;
    color: #49545C;
    font-weight: 600;
    font-size: 17px;
    line-height: 40px;
    margin-bottom: 10px;
    text-align: left;
    text-decoration: none;
    height: 42px;
    width: 46%;
    background: #ad30303b;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    border-radius: 15px;
}
.google .logo {
    background-image: url(images/icons/icon-google.png);
}.logo {
    background-size: contain;
    background-repeat: no-repeat;
    width: 18px;
    height: 18px;
    margin: 12px 24px 12px 12px;
}</style>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          
          <div class="credits">
            Designed And Developed By TC-1 Batch (Marwadi University)</a>
          </div>
          <div class="col-md-2 col-sm-3">
            <input type="hidden" id="is_active_group_chat_window" value="no" />
            <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">
          Group Chat</button>
        </div>
    
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="js/main.js"></script>
  <script src="js/util.js"></script>
  <script type="text/javascript" 
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
  <script>
$(document).ready(function() {
    
    
    $('#dtMaterialDesignExample').DataTable();
  $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample_wrapper select').removeClass(
  'custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
  
    $('.ajaxBtn').on('click', function()
    {
        var user_id = $(this).attr("data-user-id");
		$.ajax({
		    type : "post",
		    url:'<?php echo BASE_URL;?>ajax.php',
			dataType: 'json', // type of response data
			data: {user_id:user_id},
			success: function (data,status,xhr) {   // success callback function
				$(".name").html(data.name);
				$(".number").html(data.number);
				$(".email").html(data.email);
				$('#myModal').modal('show');
			},
			error: function (jqXhr, textStatus, errorMessage) { // error callback 
				$('.name').append('Error: ' + errorMessage);
			}
		});
	 });
} );</script>
  <!-- popup -->
  <div class="modal fade" id="loginModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0px solid #000000 !important;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;font-size: 3rem;position: relative;top: -7px;    text-align: right;">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="wrap-login100 p-l-55 p-r-55">
                        <form class="login100-form validate-form" method="post" action="">
                            <span class="login100-form-title p-b-37">
                                Sign In
                            </span>

                            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                                <input class="input100" type="text" name="email" placeholder="username or email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                                <input class="input100" type="password" name="password" placeholder="password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" name="user_login">
                                    Sign In
                                </button>
                            </div>

                            <div class="text-center p-t-20 p-b-20">
                                <span class="txt1">
                                  
                                </span>
                            </div>

                            <div class="flex-c p-b-10">
                                <?php $authUrl = $gClient->createAuthUrl(); ?>
                                <?php $button = '<a class="service google" target="_top" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><span class="logo"></span><span title="Sign in with Google">Sign in with Google</span></a>';?>
                                <?php echo $button;?>
                               
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
  
<html>  
    <head>  
        
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    </head>  
    <body>  
<div class="container">
         <br />
   
  <!-- <h3 align="center">Chat Application</a></h3><br />-->
           <br />
   <div class="row">
        <div class="col-md-6 col-sm-6">
   <!--  <h4>Online User</h4>-->
        </div>
        <div class="col-md-2 col-sm-3">
            <input type="hidden" id="is_active_group_chat_window" value="no" />
           <!-- <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button>
        --></div>
        <div class="col-md-2 col-sm-3">
    <!-- <p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="logout.php">Logout</a></p>
    -->
        </div>
   </div>
   <div class="table-responsive">
    
            <div id="user_details"></div>
            <div id="user_model_details"></div>
    </div>
</div>
    </body>  
</html>

<style>

.chat_message_area
{
 position: relative;
 width: 100%;
 height: auto;
 background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
 width: 100%;
 height: auto;
 min-height: 80px;
 overflow: auto;
 padding:6px 24px 6px 12px;
}

.image_upload
{
 position: absolute;
 top:3px;
 right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  
  <div id="group_chat_dialog" title="Group Chat Window">
 <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

 </div>
 <div class="form-group">
  <!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
  <div class="chat_message_area">
   <div id="group_chat_message" contenteditable class="form-control">

   </div>
   <div class="image_upload">
    <form id="uploadImage" method="post" action="../../chatupload.php">
     <label for="uploadFile"><img src="upload.png" /></label>
     <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
    </form>
   </div>
  </div>
 </div>
 <div class="form-group" align="right">
  <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
 </div>
</div>
  <!-- End popup -->
  <script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
  fetch_group_chat_history();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"../../fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"../../update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
  $('#chat_message_'+to_user_id).emojioneArea({
   pickerPosition:"top",
   toneStyle: "bullet"
  });
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"../../insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    //$('#chat_message_'+to_user_id).val('');
    var element = $('#chat_message_'+to_user_id).emojioneArea();
    element[0].emojioneArea.setText('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"../../fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
  $('#is_active_group_chat_window').val('no');
 });

 $(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"../../update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"../../update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });

 $('#group_chat_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#group_chat').click(function(){
  $('#group_chat_dialog').dialog('open');
  $('#is_active_group_chat_window').val('yes');
  fetch_group_chat_history();
 });

 $('#send_group_chat').click(function(){
  var chat_message = $('#group_chat_message').html();
  var action = 'insert_data';
  if(chat_message != '')
  {
   $.ajax({
    url:"../../group_chat.php",
    method:"POST",
    data:{chat_message:chat_message, action:action},
    success:function(data){
     $('#group_chat_message').html('');
     $('#group_chat_history').html(data);
    }
   })
  }
 });

 function fetch_group_chat_history()
 {
  var group_chat_dialog_active = $('#is_active_group_chat_window').val();
  var action = "fetch_data";
  if(group_chat_dialog_active == 'yes')
  {
   $.ajax({
    url:"../../group_chat.php",
    method:"POST",
    data:{action:action},
    success:function(data)
    {
     $('#group_chat_history').html(data);
    }
   })
  }
 }

 $('#uploadFile').on('change', function(){
  $('#uploadImage').ajaxSubmit({
   target: "#group_chat_message",
   resetForm: true
  });
 });
 
$(document).on('click', '.remove_chat', function(){
  var chat_message_id = $(this).attr('id');
  if(confirm("Are you sure you want to remove this chat?"))
  {
   $.ajax({
    url:"../../remove_chat.php",
    method:"POST",
    data:{chat_message_id:chat_message_id},
    success:function(data)
    {
     update_chat_history_data();
    }
   })
  }
 });
});  
</script>
</body>

</html>

