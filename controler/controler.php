<?php
$action = "home";
if(isset($_GET["home"])){
    $action=filter_var(["action"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
switch($action){
    case "home":
        require("view/page1.php");
        break;
    case "page2":
        require ("view/page2.php");
        break;
    default :
    require "view/404.php";
}

?>