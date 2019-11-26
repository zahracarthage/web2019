<!DOCTYPE html>
<html>
<head>
	<title>chat</title>
	<link rel="stylesheet" type="text/css" href="chat.css">
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"> </script>
</head>
<body>

<?php 
	session_start(); 
	$_SESSION['username'] = 'zahra chouchane';

?>

	<div id="wrapper">
			<h1>chat starts here</h1>

	<div class="chat_wrapper">


		<div id="chat">

			
		</div>
		<form method="POST" id="messagefrm">


			<textarea name="message" cols="30" rows="7" class="textarea"> </textarea>

		</form>
		
	</div>
</div>

<script>
loadchat();

setInterval(function(){
	loadchat();


},1000);

function loadchat()
{
	$.post('messages.php?action=getmessage',function(response){

		$('#chat').html(response);
		$('#chat').scrollTop( $('#chat').prop('scrollHeight'));

	});
}

	$('.textarea').keyup(function(e){
		if( e.which == 13) {
     	$('form').submit();
		}
	});


	$('form').submit(function(){
		var message = $('.textarea').val();
$.post('messages.php?action=sendmessage&message='+message,function(response){

	if (response===1) {
		loadchat();
document.getElementById('messagefrm').reset();
	}

});
		return false;
	});


</script>


</body>


</html>