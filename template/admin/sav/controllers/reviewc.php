<?php
include "config.php";

class reviewc {

	

function recupereretatr($id)
    {

        $sql="SELECT * from review where id=id";

        $db = config::getConnexion();
        try{

        $liste=$db->query($sql);
        return $liste;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function supprimereview($review)
    {
        $sql="DELETE FROM review where id= :id ";
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

    
    function afficherreview ()
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From review";
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

    
    

    function modifieretat($review,$id)
    {
        $sql="UPDATE review SET etat=:etat , nom=:nom, rating=:rating, email=:email, review=:review WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    try{        

          $id=$review->getid();

          $nom=$review->getnom();

         $email=$review->getemail();

         $rating=$review->getrating();

          $etat=$review->getetat();

          $review=$review->getreview();


 
          $req=$db->prepare($sql);

          $datas = array(':id'=>$id, ':nom'=>$nom, ':rating'=>$rating,':email'=>$email,':review'=>$review,':etat'=>$etat);
    
          $req->bindValue(':id',$id);
          $req->bindValue(':nom',$nom);
          $req->bindValue(':email',$email);
          $req->bindValue(':rating',$rating);
          $req->bindValue(':review',$review);
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