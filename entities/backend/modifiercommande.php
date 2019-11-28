<?php
session_start();
$id=$_SESSION['tool'];
$host='localhost';
$user2='root';
$pass='';
$db='alibaba';
$email=$_POST['email'];
$price=$_POST['price'];
$adress=$_POST['adress'];
$date=$_POST['date'];
echo $id;
$co = new PDO("mysql:host=$host;dbname=$db", $user2, $pass);
$sql = "UPDATE commande SET emailp='$email'  ,datecommande='$date' , adresse='$adress' WHERE id='$id'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
$sql = "UPDATE livraison SET prix='$price' WHERE idcommande='$id'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();

header("Location: ../../views/backend/commande.php");








?>