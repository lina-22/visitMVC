<?php
$action = filter_var($_GET["action"]?? "404", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
require_once("model/managers/languageManager.php");
switch ($action){
    case "formAdd":
        $role = $_SESSION["role"]?? false;
        if($role == "admin" || $role == "superAdmin"){
            
            require("view/language/formAdd.php");
        }
        else{
            require ("view/404.php");
            exit;
        }
    break;
    
    case "processFormAdd":
        $role = $_SESSION["role"]?? false;
        if($role == "admin" || $role == "superAdmin"){
            $langageName = filter_var($_POST["langageName"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $objectLanguageManager = new LangageManager($monPDO);
            $resultat = $objectLanguageManager -> createLangage ($langageName);
            
            if($resultat){
                $_SESSION["msg"]="Creation Successful";
                header("location:?path=language&action=formAdd");
            }
            else{
                $_SESSION["error"]="Creation Failed";
                header("location:?path=language&action=formAdd");
            }
        }
        else{
            require("view/404.php");
            exit;
        }
    break;

    case "formUpdate":
        // fetchLanguageByIdLanguage($id)
        $role = $_SESSION["role"]??false;
        if($role == "admin" || $role == "superAdmin"){
            $idLanguage = filter_var($_GET["id"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $objectLanguageManager = new LangageManager($monPDO);
            $resultat = $objectLanguageManager->fetchLanguageByIdLanguage($idLanguage);
            require("view/language/formUpdate.php");
        }
        else{
            require("view/404.php");
            exit;
        }
        break;

    case "processUpdate":
        $role = $_SESSION["role"]??false;
        if($role == "admin" || $role == "superAdmn"){
            $id = filter_var($_GET["id"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $name = filter_var($_GET["name"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $objectLanguageManager = new LangageManager($monPDO);
            $resultat = $objectLanguageManager ->updateLangage($id, $name);
            if($resultat){
                $_SESSION["msg"] = "Update successful";
                header("location:?path=admin&action=languages");
            }
            else{
                $_SESSION["error"] = "Update Failed";
                header ("location:? path=language&action=formUpdate&id=$id");
            }
        }
        else{
            require ("view/404.php");
            exit;
        }
    break;
    case "processDelete":    
        // deleteLangage($idLanguage)
       $role = $_SESSION["role"]?? false;
       if($role == "admin" || $role == "superAdmin"){
           $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
           $objectLanguageManager = new LangageManager($id);
           $resultat = $objectLanguageManager ->deleteLangage($id);
           if($resultat){
               $_SESSION["msg"] = "Delete Successful";
               header("location:?path=admin&action=languages");
           }
           else{
               $_SESSION["error"] = "Delete failed";
               header("location:?path=admin&action=languages");
           }
       } 
      else{
            require("view/404.php");
            exit;
      }
      break;
     
    default:
    require("view/404.php");  
}

?>