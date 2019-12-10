

<?php  
include('../../config.php');
 
class commande
{


private $prix;
private $datacommande;
private $adresse;
private $etat;




function afficherdelivryid()
{
 $con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM commande  ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];

$sql = "SELECT * FROM livraison where idcommande='$id' ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{

echo "<option>";
echo $data1['id'];
echo "</option>";
 
}
}
}


function affichercommande()
{
$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM commande  ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];

$sql = "SELECT * FROM livraison where idcommande='$id' ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{
$occ++;





                                                    echo "<tr>";
                                                     echo "<form action='../../entities/backend/supprimercommande.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['id'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['prix'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['datecommande'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['adresse'];

                                                       echo "</td>";
                                                        echo "<input name='adress' hidden value='".$data['adresse']."'>";
                                                       if($data1['etat']=='In transit')
                                                       {
                                                       echo "<td><span class='badge-dot badge-brand mr-1'></span>";
                                                        }
                                                        else
                                                        {
                                                         echo "<td><span class='badge-dot badge-success mr-1'></span>";

                                                        }
                                                       echo $data1['etat'];
                                                       echo "</td>";
                                                       echo "<td><button value='delete' name='submit' class='btn btn-outline-danger'>Delete</button></td>
                                                         <td><button value='update' name='submit' class='btn btn-outline-info'>update</button></td>
<td><button value='Map' name='submit' class='btn btn-outline-warning'>Map</button></td>
                                                         </tr>";
                                                         echo "</form>";


                                                        
                                                        
                                                        
                                
                                                     }
                                                        
                                                       } 	
}



function ajoutercommandeandlivraison($email,$adress,$price,$status,$date)
{
$con=new config();
$co=$con->getconnexion();	
$nb=rand(999999,100000);
$holy=" INSERT INTO commande (id,emailp,adresse,datecommande,confirmation) values ('$nb','$email','$adress','$date','yes')";
$query=$co->prepare($holy);
$query=$co->query($holy);
$nb1=rand(100000,999999);
$holy="INSERT into livraison (id,idcommande,etat,prix) values ('$nb1','$nb','$status','$price')";
$query=$co->prepare($holy);
$query=$co->query($holy);
header("location:../../views/backend/commande.php");

}
function Supprimercommande($id)
{
$con=new config();
$co=$con->getconnexion();	
$sql = "DELETE FROM commande  WHERE id=$id";
$query=$co->prepare($sql);
$query->execute();
$sql = "DELETE FROM livraison  WHERE idcommande=$id";
$query=$co->prepare($sql);
$query->execute();
header("location: ../../views/backend/commande.php");
}

function Modifiercommande($id,$email,$price,$adress,$date)
{
$con=new config();
$co=$con->getconnexion();
$sql = "UPDATE commande SET emailp='$email'  ,datecommande='$date' , adresse='$adress' WHERE id='$id'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
$sql = "UPDATE livraison SET prix='$price' WHERE idcommande='$id'";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();

header("Location: ../../views/backend/commande.php");	
}

function Tri_par_id()
{
$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM commande order by id  ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];

$sql = "SELECT * FROM livraison where idcommande='$id'  ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{
$occ++;





                                                


                                                    echo "<tr>";
                                                     echo "<form action='../../entities/backend/supprimercommande.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['id'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['prix'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['datecommande'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['adresse'];

                                                       echo "</td>";
                                                        echo "<input name='adress' hidden value='".$data['adresse']."'>";
                                                       if($data1['etat']=='In transit')
                                                       {
                                                       echo "<td><span class='badge-dot badge-brand mr-1'></span>";
                                                        }
                                                        else
                                                        {
                                                         echo "<td><span class='badge-dot badge-success mr-1'></span>";

                                                        }
                                                       echo $data1['etat'];
                                                       echo "</td>";
                                                       echo "<td><button value='delete' name='submit' class='btn btn-outline-danger'>Delete</button></td>
                                                         <td><button value='update' name='submit' class='btn btn-outline-info'>update</button></td>
<td><button value='Map' name='submit' class='btn btn-outline-warning'>Map</button></td>
                                                         </tr>";
                                                         echo "</form>";


                                                        
                                                        
                                                        
                                
                                                     }
                                                        
                                                       } 
}

function Tri_par_date()
{
$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM commande order by datecommande ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];

$sql = "SELECT * FROM livraison where idcommande='$id' ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{
$occ++;





                                                    echo "<tr>";
                                                     echo "<form action='../../entities/backend/supprimercommande.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['id'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['prix'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['datecommande'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['adresse'];

                                                       echo "</td>";
                                                        echo "<input name='adress' hidden value='".$data['adresse']."'>";
                                                       if($data1['etat']=='In transit')
                                                       {
                                                       echo "<td><span class='badge-dot badge-brand mr-1'></span>";
                                                        }
                                                        else
                                                        {
                                                         echo "<td><span class='badge-dot badge-success mr-1'></span>";

                                                        }
                                                       echo $data1['etat'];
                                                       echo "</td>";
                                                       echo "<td><button value='delete' name='submit' class='btn btn-outline-danger'>Delete</button></td>
                                                         <td><button value='update' name='submit' class='btn btn-outline-info'>update</button></td>
<td><button value='Map' name='submit' class='btn btn-outline-warning'>Map</button></td>
                                                         </tr>";
                                                         echo "</form>";



                                                        
                                                        
                                                        
                                
                                                     }
                                                        
                                                       } 
}
function Rechercher($adress)
{
$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM commande where adresse='$adress'";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];

$sql = "SELECT * FROM livraison where idcommande='$id' ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{
$occ++;







                                                    echo "<tr>";
                                                     echo "<form action='../../entities/backend/supprimercommande.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['id'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['prix'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['datecommande'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['adresse'];

                                                       echo "</td>";
                                                        echo "<input name='adress' hidden value='".$data['adresse']."'>";
                                                       if($data1['etat']=='In transit')
                                                       {
                                                       echo "<td><span class='badge-dot badge-brand mr-1'></span>";
                                                        }
                                                        else
                                                        {
                                                         echo "<td><span class='badge-dot badge-success mr-1'></span>";

                                                        }
                                                       echo $data1['etat'];
                                                       echo "</td>";
                                                       echo "<td><button value='delete' name='submit' class='btn btn-outline-danger'>Delete</button></td>
                                                         <td><button value='update' name='submit' class='btn btn-outline-info'>update</button></td>
<td><button value='Map' name='submit' class='btn btn-outline-warning'>Map</button></td>
                                                         </tr>";
                                                         echo "</form>";


                                                        
                                                        
                                                        
                                
                                                     }
                                                        
                                                       }   
}

function affichercommandeforliv()
{
$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM commande  ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];

$sql = "SELECT * FROM livraison where idcommande='$id'  ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{
$occ++;




if($data1['etat']=='In transit')
{
                                                    echo "<tr>";
                                                     echo "<form action='../../entities/backend/delivred.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['id'].">";
echo "<input  hidden  name='idtest1' value="; 
echo $data1['id'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['prix'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['datecommande'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['adresse'];

                                                       echo "</td>";
                                                        echo "<input name='adress' hidden value='".$data['adresse']."'>";
                                                       if($data1['etat']=='In transit')
                                                       {
                                                       echo "<td><span class='badge-dot badge-brand mr-1'></span>";
                                                        echo $data1['etat'];
                                                        }
                                                  
                                                      
                                                       echo "</td>";
                                                       echo "
<td><button value='Map' name='submit' class='btn btn-outline-warning'>Delivred</button></td>
                                                         </tr>";

                                                         echo "</form>";

}

                                                        
                                                        
                                                        
                                
                                                     }
                                                        
                                                       }  
}


function updateliv($id)
{
$con=new config();
$co=$con->getconnexion();
$sql = "UPDATE livraison SET etat='Delivred' WHERE id='$id'";
$query=$co->prepare($sql);
$query->execute();
header("Location: ../../views/backend/livreursession.php");

}

}




?>