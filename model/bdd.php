<?php
/**
 * Fonction qui permert de ce connecter a la bdd
 *
 * @return PDO|false $connex Un objet PDO qui represente la co au SGBD
 */
function etablirCo(){
    $urlSGBD = "localhost";
    $nomBDD = "visit";
    $loginBDD = "root";
    $mdpBDD = "" ;

    try{
        $connex = new PDO("mysql:host=$urlSGBD;dbname=$nomBDD","$loginBDD", "$mdpBDD", array (PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMEs utf8'));
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $error){
        echo "File:".$error->getFile(). "<br>";
        echo "Line:".$error->getLine(). "<br>";
        echo "Msg:" .$error->getMessage(). "<br>";
    }
    return $connex;
}


?>