<?php
include "config.php";

class reclamationc {

	function recupereretat($id)
    {

        $sql="SELECT * from savcontact where id=id";

        $db = config::getConnexion();
        try{

        $liste=$db->query($sql);
        return $liste;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function supprimerreclamation($reclamation)
    {
        $sql="DELETE FROM savcontact where id= :id ";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        
        $req->bindValue(':id',$_POST["id"]);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    function afficherreclamation()
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From savcontact";
        $db = config::getConnexion();
        try
        {
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }   
    }

    
    

    function modifieretat($reclamation,$id)
    {
        $sql="UPDATE savcontact SET etat=:etat , nom=:nom, prenom=:prenom, email=:email, sujet=:sujet, message=:message WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    try{        
          $id=$reclamation->getid();
          $nom=$reclamation->getnom();

          $prenom=$reclamation->getprenom();
          $email=$reclamation->getemail();

          $sujet=$reclamation->getsujet();
          $message=$reclamation->getmessage();
          $etat=$reclamation->getetat();

        $req=$db->prepare($sql);

      $datas = array(':id'=>$id, ':nom'=>$nom, ':prenom'=>$prenom,'email'=>$email,':sujet'=>$sujet,':message'=>$message,':etat'=>$etat);
    
        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':email',$email);
        $req->bindValue(':sujet',$sujet);
        $req->bindValue(':message',$message);
        $req->bindValue(':etat',$etat);


        
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
          echo " Les datas : " ;
        print_r($datas);
        }
        
    }

}

	

?>