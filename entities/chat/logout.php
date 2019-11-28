<?php

//logout.php

session_start();

session_destroy();

header('location: ../../views/chat/login.php');

?>