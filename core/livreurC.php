 <?php 
include('config.php');
/**
 * 
 */
class livreur
{
	


function afficherliv()
{


$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM livreur  ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$id=$data['id'];




$occ++;





                                                    echo "<tr>";
                                                     echo "<form action='../../entities/backend/supprimerlivraison.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['id'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['nom'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['prenom'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['salaire'];

                                                       echo "</td>";
                                                       
                                                     
                                                       echo "<td><button value='delete' name='submit' class='btn btn-outline-danger'>Delete</button></td>
                                                         <td><button value='update' name='submit' class='btn btn-outline-info'>update</button></td>
                                                         </tr>";
                                                         echo "</form>";


                                                        
                                                        
                                                        
                                
                                                     }
                                                        
                                                       } 	



function supprimerliv($id)
{
$con=new config();
$co=$con->getconnexion();	
$sql = "DELETE FROM livreur WHERE id=$id";
$query=$co->prepare($sql);
$query->execute();
header("location: ../../views/backend/livrasion.php");


}

                                                   function modifierliv($id,$id1,$salaire)
                                                   {
$con=new config();
$co=$con->getconnexion();
$sql = "UPDATE livreur SET salaire='$salaire'  ,idlivraison='$id1'  WHERE id='$id'";
$query=$co->prepare($sql);
$query->execute();
header("location:livrasion.php");



                                                   }




                                                   }


















 ?>