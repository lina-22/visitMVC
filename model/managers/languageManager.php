<?php
//require_once("model/classes/language.class.php");
class LangageManager{
    private $lePDO;

    public function __construct($paramPDO)
    {
        $this->lePDO=$paramPDO;
    }

    public function fetchAllLanguages(){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM languages");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Langage");
            $resultat = $sql->fetchAll();
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }
}?>
fetchLanguageByIdLanguage/ updateLangage/  createLangage/ deleteLangage