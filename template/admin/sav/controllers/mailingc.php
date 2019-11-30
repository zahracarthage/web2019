<?php

include_once "config.php";

class mailingc {



    function ajouteremail($mailing) 

        {

        $sql="insert into mailing (id,sujet,reponse,email) values (:id,:sujet,:reponse,:email) 

       ";

        $db = config::getConnexion();
 
        try {

        $req=$db->prepare($sql);

        $id=$mailing->getid();
        $sujet=$mailing->getsujet();
        $reponse=$mailing->getreponse();
        $email=$mailing->getemail();


        $req->bindValue(':id',$id);
        $req->bindValue(':sujet',$sujet);

        $req->bindValue(':reponse',$reponse);
        $req->bindValue('email',$email);
 
        
            $req->execute();
           
           }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
             echo " Erreur ! ".$e->getMessage();
          echo " Les datas : " ;
        print_r($datas);
        }   
      }



    


    function supprimeremail($mailing)
    {
        $sql="DELETE FROM mailing where id= :id ";
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

    function recuperer($idemail)
    {

        $sql="SELECT * from mailing where idemail=idemail";

        $db = config::getConnexion();
        try{

        $liste=$db->query($sql);
        return $liste;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficheremail()
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From mailing";
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

    
    

   

}

	

?>