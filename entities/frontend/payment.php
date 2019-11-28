<?php

$host='localhost';
$user2='root';
$pass='';
$db='alibaba';

$co = new PDO("mysql:host=$host;dbname=$db", $user2, $pass);
$prix=0;
$occ=0;

if(isset($_POST['product1']))
{
 $p1=$_POST['product1'];
 $sql = "SELECT * FROM produit where Nomprod='$p1'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];	
}
echo $prix;

}
if(isset($_POST['product2']))
{
$p2=$_POST['product2'];
 $sql = "SELECT * FROM produit where Nomprod='$p2'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}
}
if(isset($_POST['product3']))
{
$p3=$_POST['product3'];
 $sql = "SELECT * FROM produit where Nomprod='$p3'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}
}
if(isset($_POST['product4']))
{
$p4=$_POST['product4'];	
 $sql = "SELECT * FROM produit where Nomprod='$p4'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}
}
if(isset($_POST['product5']))
{
$p5=$_POST['product5'];
 $sql = "SELECT * FROM produit where Nomprod='$p5'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}	
}
if(isset($_POST['product6']))
{
 $sql = "SELECT * FROM produit where Nomprod='$p6'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}	
}
if(isset($_POST['product7']))
{
$p7=$_POST['product7'];
 $sql = "SELECT * FROM produit where Nomprod='$p7'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}	
}
if(isset($_POST['product8']))
{

$p8=$_POST['product8'];	
 $sql = "SELECT * FROM produit where Nomprod='$p8'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}
}
if(isset($_POST['product9']))
{

$p9=$_POST['product9'];
 $sql = "SELECT * FROM produit where Nomprod='$p9'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
if($data=$query->fetch())
{
echo $data['stock'];
if($data['stock']==0)
{
$occ++;
}
echo "</br>";
echo $data['prix'];
$prix=$prix+$data['prix'];
echo $prix;
}
}
$adress=$_POST['address1'];
echo $adress;
$email=$_POST['email1'];
echo $email;
echo "todaaaay is ";
if($occ==0)
{
$nb=rand(999999,100000);
$date=date("Y/m/d");
echo "VOILLLLLLLLLLLLLLLLLLLLLA";
echo $date;
$holy=" INSERT INTO commande (id,emailp,adresse,datecommande,confirmation) values ('$nb','$email','$adress','$date','yes')";
$query=$co->prepare($holy);
$query=$co->query($holy);
$nb1=rand(100000,999999);
$holy="INSERT into livraison (id,idcommande,etat,prix) values ('$nb1','$nb','In transit','$prix')";
$query=$co->prepare($holy);
$query=$co->query($holy);
$subject='Commande';
$message='Merci d avoir commander nos produit il vous seront delivrer dans deux jours !';
$headers='From: Alibaba';
if(mail($email,$subject,$message,$headers))
{
header("location: ../../views/frontend/index.html");
}
header("location: ../../views/frontend/index.html");
}

else
{
$nb=rand(999999,100000);	
$holy=" INSERT INTO commande (id,emailp,adresse,confirmation) values ('$nb','$email','$adress','no')";
$query=$co->prepare($holy);
$query=$co->query($holy);	
}

?>