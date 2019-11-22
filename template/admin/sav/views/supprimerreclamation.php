<?PHP
include "../controllers/reclamationc.php";

$reclamationc1=new reclamationc();



	if (isset($_POST["id"])){
	$reclamationc1->supprimerreclamation($_POST["id"]);
	header('Location: reclamation.php'); }




?>