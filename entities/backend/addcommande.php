<?php

$host='localhost';
$user2='root';
$pass='';
$db='alibaba';

$co = new PDO("mysql:host=$host;dbname=$db", $user2, $pass);
$email=$_POST['email'];
echo $email;
$adress=$_POST['adress'];
$price=$_POST['price'];
$status=$_POST['status'];
echo $status;
$date=$_POST['date'];
$nb=rand(999999,100000);
$holy=" INSERT INTO commande (id,emailp,adresse,datecommande,confirmation) values ('$nb','$email','$adress','$date','yes')";
$query=$co->prepare($holy);
$query=$co->query($holy);
$nb1=rand(100000,999999);
$holy="INSERT into livraison (id,idcommande,etat,prix) values ('$nb1','$nb','$status','$price')";
$query=$co->prepare($holy);
$query=$co->query($holy);
header("location: ../../views/backend/commande.php");


?>