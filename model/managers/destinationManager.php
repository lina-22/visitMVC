<?php
//require_once("model/classes/destination.class.php");
class DestinationManager{
    private $lePDO;
    public function __construct($foo)
    {
        $this->lePDO=$foo;
    }

    public function fetchAllDestinationsOrderByName(){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM destinations order by name");
            $sql->execute();
            //Definir le mode de recuperation des données
            
            $sql->setFetchMode(PDO::FETCH_CLASS,"Destination");
            $resultat = $sql->fetchAll();
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
    public function fetchDestinationByIdDestination($unId){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM destinations WHERE idDestination=:aId");
            $sql->bindParam(":aId",$unId);
            $sql->execute();
            //Definir le mode de recuperation des données         
            $sql->setFetchMode(PDO::FETCH_CLASS,"Destination");
            $resultat = $sql->fetch();
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function createDestination($name,$description,$openingDate,$closingDate,$price,$duration,$idCountry){
        //idDestination	name	description	openingDate	closingDate	price	isAvailable	duration	idCountry
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("INSERT INTO destinations values(null,:name,:description,:openingDate,:closingDate,:price,true,:duration,:idCountry)");
            $sql->bindParam(":name",$name);
            $sql->bindParam(":description",$description);
            $sql->bindParam(":openingDate",$openingDate);
            $sql->bindParam(":closingDate",$closingDate);
            $sql->bindParam(":price",$price);
            $sql->bindParam(":duration",$duration);
            $sql->bindParam(":idCountry",$idCountry);
            $sql->execute();
            //lastInsertId permet de connaitre l'id de la destination que l'on vient juste d'afficher

        //     $lastNumber= $connex->lastInsertId();
        //    return $lastAddedDestination=$this->fetchDestinationByIdDestination($lastNumber);
        // return "destination inserted "
         return $connex->lastInsertId();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        } 
    }

}
?>