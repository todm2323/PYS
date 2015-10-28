$('#form').submit(function(){
	//var landmarkID = $(this).parent().attr('data-landmark-id');
	//var postData = $(this).serialize();
	var email=$('#email').val();
	var commend=$('#commend').val();
	var dataString="email="+emil+"&commend="+commemd+"&signgup=";
	if($.trim(email).length>0 & $.trim(commend).length>0)
{
$.ajax({
type: "POST",
url: 'http://pyswebsite.noip.me/save.php',
data: dataString,
crossDomain: true,
cache: false,
beforeSend: function(){ $("#signup").val('Connecting...');},
success: function(data){
if(data=="success")
{
alert("Thank you for Registering with us! you can login now");
}
else if(data="exist")
{
alert("Hey! You alreay has account! you can login with us");
}
else if(data="failed")
{
alert("Something Went wrong");
}
}
});
}
else{
	alert("Please try again");
}
return false;
});
