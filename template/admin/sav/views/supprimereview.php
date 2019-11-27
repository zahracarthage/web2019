<?PHP
include "../controllers/reviewc.php";

$revc1=new reviewc();



	if (isset($_POST["id"])){

	$revc1->supprimereview($_POST["id"]);

	header('Location: reviews.php'); }




?>