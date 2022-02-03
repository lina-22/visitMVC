<?php
require_once ("model/classes/country.class.php");
class CountryManager{
    private $lePDO;
    public function __construct($paramPDO){
        $this->lePDO=$paramPDO;
    }

    public function fetchAllCountries(){
        try{
            $connex=$this->lePDO;
            $sql = $connex->prepare("SELECT * FROM countries");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Country");
            $resultat = $sql->fetchAll();
            return $resultat;
        } catch (PDOException $error){
            echo $error->getMessage();
            return false;
        }
    }

    public function createCountry($aName,$aRegion,$aPopulation,$aSubregion,$aCapital){
        try {
//            idCountry	name	population	region	subregion	flag	capital
            $connex=$this->lePDO;
            $sql =$connex->prepare("INSERT INTO countries values(null,:theName,:thePopulation,:theRegion,:theSubregion,' ',:theCapital)");
            $sql->bindParam(":theName",$aName);
            $sql->bindParam(":theRegion",$aRegion);
            $sql->bindParam(":thePopulation",$aPopulation);
            $sql->bindParam(":theSubregion",$aSubregion);
            $sql->bindParam(":theCapital",$aCapital);
            $sql->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
?>