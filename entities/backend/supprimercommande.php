.<?php

$host='localhost';
$user2='root';
$pass='';
$db='alibaba';

$co = new PDO("mysql:host=$host;dbname=$db", $user2, $pass);

if( $_POST['submit']=='delete')
{
$id=$_POST['idtest'];

$sql = "DELETE FROM commande  WHERE id=$id";
$query=$co->prepare($sql);
$query->execute();
$sql = "DELETE FROM livraison  WHERE idcommande=$id";
$query=$co->prepare($sql);
$query->execute();
header("location: ../../views/backend/commande.php");

}
if($_POST['submit']=='update')
{
session_start();
$_SESSION['tool']=$_POST['idtest'];
header("location: ../../views/frontend/modifier.html");
	
}




?>