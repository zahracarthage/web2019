<?php
include ('../config.php');

switch ( $_REQUEST['action'] ) {

	case 'sendmessage':
	

session_start();

	$query = $db->prepare("INSERT into messages SET user=?, message=?");

	$run = $query->execute([$_SESSION['username'], $_REQUEST['message']]);

	if ($run) {
		echo "1";
		exit;
		# code...
	}
break;


	case 'getmessage':

	echo "working";

	$query = $db->prepare("SELECT * FROM messages ");

	$run = $query->execute();
	$rs= $query->fetchAll(PDO::FETCH_OBJ);

	$chat='';

	foreach ($rs as $message) 
	{
		
		$chat .= '<div class="single">
<strong>' .$message->user. ': </strong>' .$message->message.
'<span>'.date('m-d-Y h:i a',strtotime($message->date)). '</span>
					</div>';
	}



	


	echo "$chat";
	break;		# code...
	}
	
			



?>