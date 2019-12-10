<?PHP 
include_once"../../config1.php";
class categorieC
{
	 function ajoutercategorie($categorie)
	{   
		    $ref=$categorie->getref();
            $nomcategorie=$categorie->getnomcategorie();
            
		$sql="insert into categorie (ref,nomcategorie) values ('$ref','$nomcategorie')";
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
	function affichercategories()
	{
		
		$sql="SElECT * From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	 function affichercategorie($categorie)
	{
       echo "ref:".$categorie->getref()."<br>";
       echo "nomcategorie:".$categorie->getnomcategorie()."<br>";
       
	}
		function afficherproduitscategorie()
	{
		$sql="SELECT * FROM categorie,produit  where categorie.ref = produit.refcategorie";
			$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

	}
	function supprimercategorie($ref)
	{
		$db = config::getConnexion();
		$sql="DELETE FROM categorie WHERE ref=:ref";
		$req = $db->prepare($sql);
		$req->bindValue(':ref',$ref);
		try
		{
            $req->execute();
           
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>