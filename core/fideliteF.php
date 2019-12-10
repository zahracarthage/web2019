<?PHP
include "config.php";

class fideliteF {

	
function ajouterfidelite($fidelite){
		$sql="insert into fidelite (ref,id_client,point) values (:ref,:id_client, :point)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $ref=$fidelite->getref();
        $id_client=$fidelite->getid_client();
        $point=$fidelite->getpoint(); 
        $req->bindValue(':ref',$ref);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':point',$point);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
       }
		
	}
	
	function afficherfidelite(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From fidelite";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerfidelite($ref){
		$sql="DELETE FROM fidelite where ref= :ref";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ref',$ref);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifier($fidelite,$ref){
		$sql="UPDATE fidelite SET ref=:ref, id_client=:id_client, point =:point WHERE ref=:ref";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$ref=$fidelite->getref();
        $id_client=$fidelite->getid_client();
        $point=$fidelite->getpoint();
		$req->bindValue(':ref',$ref);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':point',$point);
		
            $s=$req->execute(); 
             ob_start();
       header("Location:fidelite.php");
       exit();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   /*
  print_r($datas);*/
        }
		
	}
	function recupererfidelite($ref){
		$sql="SELECT * from fidelite where ref=$ref";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListefidelite($ref){
		$sql="SELECT * from fidelite where ref=$ref";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>