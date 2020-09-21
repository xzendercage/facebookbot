 <script language="javascript">
function logintoken() {
if(!$('#token').val()) {
toastr.error("You have not AddedToken", "Notification");
}else {
load();
}
}

function load()
{
      $('#login').html('<i class="fa fa-spinner fa-spin"></i> Processing');
    var url = "login/login.php?token="+$('#token').val();
    var data = {};
    // Success Function
    var success = function (result){
        $('#login').html(result);
    };
 
    // Result Type
    var dataType = 'text';
 
    // Send Ajax
    $.get(url, data, success, dataType);
}

</script>



 <script language="javascript">

function get() {
if(!$('#u').val()) {
alert("Please enter Username");
}else if(!$('#p').val()) {
alert("Please enter Password");
}else {
adminxuly();
}
}

   function adminxuly(){
      $('#get').html('<i class="fa fa-spinner fa-spin"></i> Processing');
                $.ajax({
                    url : "login/token.php",
                    type : "post",
                    dateType:"text",
                    data : {
                         u : $('#u').val(), p : $('#p').val()
                    },
                    success : function (result){
                        $('#geted').html(result);
                    }
                });
            }


</script>

