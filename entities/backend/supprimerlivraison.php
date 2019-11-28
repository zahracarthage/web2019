.<?php

$host='localhost';
$user2='root';
$pass='';
$db='alibaba';

$co = new PDO("mysql:host=$host;dbname=$db", $user2, $pass);

if( $_POST['submit']=='delete')
{
$id=$_POST['idtest'];

$sql = "DELETE FROM livreur  WHERE id=$id";
$query=$co->prepare($sql);
$query->execute();

header("location: ../../views/backend/livrasion.php");



 }
?>