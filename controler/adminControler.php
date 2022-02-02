<?php
$action=filter_var($_GET["action"]??"404",FILTER_SANITIZE_STRING);
require_once("model/mangers/languageManager.php");
require_once("model/managers/countryManager.php");
switch($action){
    case "dashboard":
        require ("view/admin/dashboard.php");
        break;
    case "languages":
        $objectManager= new LangageManager($monPDO);
        $languages=$objectManager->fetchAllLanguages();
        require ("view/admin/dashboardLanguages.php");
        break;
    case "countries":
        $objectManager= new CountryManager($monPDO);
        $$countries=$objectManager->fetchAllCountries();
        require("view/admin/dashboardCountries.php");
        break;
    default:
        require ("view/404.php");            
}

?>