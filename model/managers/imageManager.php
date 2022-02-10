<?php
require_once("model/classes/image.class.php");
class ImageManager{
    private $lePDO;
    public function __construct($foo)
    {
        $this->lePDO=$foo;
    }

    public function fetchAllImagesByIdDestination($idDestination){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM images where idDestination=:id");
            $sql->bindParam(":id",$idDestination);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Image");
            $resultat = $sql->fetchAll();
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }

    }

    public function fetchMainImageByIdDestination($idDestination){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM images where mainImage=true and idDestination=:id");
            $sql->bindParam(":id",$idDestination);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Image");
            $resultat = $sql->fetch();
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    public function createImage($idDestination,$mainImage,$name="foobar"){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("INSERT INTO images values(null,:name,:main,:idDestination)");
            $sql->bindParam(":name",$name);
            $sql->bindParam(":main",$mainImage);
            $sql->bindParam(":idDestination",$idDestination);
            $sql->execute();
            $idImage=$connex->lastInsertId();

            $sql2=$connex->prepare("UPDATE images set name=:finalName where idImage=:idImage");

            $finalName="image$idImage.jpg";
            
            $sql2->bindParam(":finalName",$finalName);
            $sql2->bindParam(":idImage",$idImage);
            $sql2->execute();
            return $idImage;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        } 
    }

    public function somme(...$nombres){
        return array_sum($nombres);
    }
}
?>