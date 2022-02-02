<?php
session_start();
$_SESSION["token"]=$_SESSION["token"]??bin2hex(random_bytes(32));
var_dump($_SESSION);

// ****My problem*****// ****My problem*****// ****My problem*****// ****My problem*****
// function myautoloader($class){
//     if(strstr($class, "Manager")){
//         include 'model/managers/' . $class . '.php';
//     }
//     else{
//         include 'model/classes/' .$class . '.class.php';
//     }
// }
// spl_autoload_register('my_autoloader');
// ****My problem*****// ****My problem*****// ****My problem*****// ****My problem*****

$path="main";
if(isset($_GET["path"])){
    $path=filter_var($_GET["path"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
}
require("model/bdd.php");
// $monPDO=etablirCo();
switch($path){
     case"main":
        require ("controler/controler.php");
        break;
        case "user":
            require("controler/userControler.php");
            break;
        case "admin":
            $role=$_SESSION["role"] ?? false;
             if($role =="admin"||"superAdmin"){
                 require ("controler/adminControler.php");
             }else{
                 require ("view:404.php");
                 exit;
             }; 
             break;   
        case "language":
            require("controler/languageControler.php");
        break;
        case "destination":
            require("controler/destinationControler.php");
        break;
        case "reservation":
            require("controler/reservationControler.php");
            break;
        case "country":
            require ("controler/countryControler.php");
            break;
        default :
        require "view/404.php";    
}


?>