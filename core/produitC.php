<?PHP 
include_once "../../config1.php";
class produitC
{  
		
	 function ajouterproduit($produit)
	{   
		    $refproduit=$produit->getrefproduit();
            $nomproduit=$produit->getnomproduit();
            $marque=$produit->getmarque();
            $description=$produit->getdescription();
            $urlimage=$produit->geturlimage();
            $quantite=$produit->getquantite();
            $prixproduit=$produit->getprixproduit();
            $dateajout=$produit->getdateajout();
            $refcategorie=$produit->getrefcategorie();
		$sql="insert into produit (refproduit,nomproduit,marque,description,urlimage,quantite,prixproduit,dateajout,refcategorie) values ('$refproduit','$nomproduit','$marque','$description','$urlimage','$quantite','$prixproduit','$dateajout','$refcategorie')";
		$db = config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			$req->execute();
        }
		catch(Exception $e)
		{
			echo "erreur:" .$e->getMessage();
		}
	}
	function afficherproduits()
	{
		
		$sql="SElECT * FROM produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	 function afficherproduit($produit)
	{
       echo "refproduit:".$produit->getrefproduit()."<br>";
       echo "nom:".$produit->getnomproduit()."<br>";
       echo "marque".$produit->getmarque()."<br>";
       echo "description:".$produit->getdescription()."<br>";
       echo "urlimage:".$produit->geturlimage()."<br>";
       echo "quantité:".$produit->getquantite()."<br>";
       echo "prixproduit:".$produit->getprixproduit()."<br>";
       echo "dateajout:".$produit->getdateajout()."<br>";
        echo "refcategorie:".$produit->getrefcategorie()."<br>";
	}
	function modifierproduit($produit,$refproduit)
	{
		$sql="UPDATE produit SET refproduit=:refproduits, nomproduit=:nomproduit,marque=:marque,description=:description,urlimage=:urlimage,quantite=:quantite,prixproduit=:prixproduit,dateajout=:dateajout,refcategorie=:refcategorie WHERE refproduit=:refproduit";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $refproduits=$produit->getrefproduit();
            $nomproduit=$produit->getnomproduit();
            $marque=$produit->getmarque();
            $description=$produit->getdescription();
            $urlimage=$produit->geturlimage();
            $quantite=$produit->getquantite();
            $prixproduit=$produit->getprixproduit();
            $dateajout=$produit->getdateajout();
            $refcategorie=$produit->getrefcategorie();
		$datas=array(':refproduits'=>$refproduits,':refproduit'=>$refproduit, ':nomproduit'=>$nomproduit,':marque'=>$marque, ':description'=>$description,':urlimage'=>$urlimage,':quantite'=>$quantite,':prixproduit'=>$prixproduit,':dateajout'=>$dateajout,':refcategorie'=>$refcategorie);
		$req->bindValue(':refproduits',$refproduits);
		$req->bindValue(':refproduit',$refproduit);
        $req->bindValue(':nomproduit',$nomproduit);
        $req->bindValue(':marque',$marque);
		$req->binValue(':description',$description);
		$req->binValue(':urlimage',$urlimage);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':prixproduit',$prixproduit);
		$req->bindValue(':dateajout',$dateajout);
		$req->bindValue(':refcategorie',$refcategorie);

		$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}


	 function supprimerproduit($refproduit)
	{
		$db = config::getConnexion();
		$sql="DELETE FROM produit WHERE refproduit=:refproduit";
		$req = $db->prepare($sql);
		$req->bindValue(':refproduit',$refproduit);
		try
		{
            $req->execute();
           
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
	function reccupererproduit($refproduit)
	{
		$sql="SELECT * from produit where refproduit=$refproduit ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
 	    $req->execute();
 		$produit= $req->fetchALL(PDO::FETCH_OBJ);
		return $produit;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
 public function rechercherProduits($foo)
    {   
	    $db = config::getConnexion(); 
        $sql="SELECT * from produit where nomproduit LIKE '%$foo%'  ";
         //connexion bd
        
        //reqt sql
        //fetch data
        try
        {
        	$req=$db->prepare($sql);
 	    $req->execute();
 		$rdv= $req->fetchALL(PDO::FETCH_OBJ);
		return $rdv;
        }
        catch (Exception $e)
        {
        	die('Erreur:'.$e->getMessage());
        }
    }
	public function triPrix()
	{
		$db = config::getConnexion();
    	$sql = "SELECT * FROM produit ORDER BY prixproduit ASC;";
		
		$req = $db->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_OBJ);
		return $result;
	
	}
	public function triPrixDesc()
	{
		$db = config::getConnexion();
    	$sql = "SELECT * FROM produit ORDER BY prixproduit DESC;";
		
		$req = $db->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_OBJ);
		return $result;
	
	}
	 public function triPrixA()
	{
		$db = config::getConnexion();
    	$sql = " SELECT * FROM produit ORDER BY nomproduit ASC";
		
		$req = $db->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_OBJ);
		return $result;
	
	}
 public function triPrixZ()
	{
		$db = config::getConnexion();
    	$sql = " SELECT * FROM produit ORDER BY nomproduit DESC";
		
		$req = $db->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_OBJ);
		return $result;
	
	}
		function trierproduitqteDESC()
	{
  		$db = config::getConnexion();
       		$sql="SELECT * FROM produit order by quantite DESC";

		try{
 		$req=$db->prepare($sql);
 	    $req->execute();
 		$produit= $req->fetchALL(PDO::FETCH_OBJ);
		return $produit;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function trierproduitqteASC()
	{
  		$db = config::getConnexion();
       		$sql="SELECT * FROM produit order by quantite ASC";

		try{
 		$req=$db->prepare($sql);
 	    $req->execute();
 		$produit= $req->fetchALL(PDO::FETCH_OBJ);
		return $produit;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
}
?>