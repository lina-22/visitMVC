<?php
    $action=filter_var($_GET["action"]?? "destinations",FILTER_SANITIZE_STRING) ;
    //require_once("model/managers/destinationManager.php");
    //require_once("model/managers/countryManager.php");
    switch ($action) {
        case "destinations" :
            $objectDestinationManager= new DestinationManager($monPDO);
            $destinations= $objectDestinationManager->fetchAllDestinationsOrderByName();
            require("view/destination/destinations.php");
        break;
        
        case "destination" :
            $id=filter_var($_GET["id"],FILTER_SANITIZE_NUMBER_INT);
            $objectDestinationManager = new DestinationManager($monPDO);
            $destination=$objectDestinationManager->fetchDestinationByIdDestination($id);
            require ("view/destination/destination.php");
        break;
        
        case "formAdd":
            $countryManager = new CountryManager($monPDO);
            $countries = $countryManager->fetchAllCountries();
            require ("view/destination/formAdd.php");
            break;

        case "processFormAdd":
            $role=$_SESSION["role"]??false;
            if($role=="admin"||$role=="superAdmin"){
                $name=filter_var($_GET["name"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $description=filter_var($_GET["description"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $openingDate=filter_var($_GET["openingDate"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $closingDate=filter_var($_GET["closingDate"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $duration=filter_var($_GET["duration"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $idCountry=filter_var($_GET["idCountry"],FILTER_SANITIZE_NUMBER_INT);
                $price=filter_var($_GET["price"],FILTER_SANITIZE_NUMBER_FLOAT);

                $objectDestinationManager= new DestinationManager($monPDO);
                $idDestination=$objectDestinationManager->createDestination($name,$description,$openingDate,$closingDate,$price,$duration,$idCountry);

                $imageManager = new ImageManager($monPDO);
                $idImage=$imageManager->createImage($idDestination,true);
                move_uploaded_file($_FILES["imageDestination"]["tmp_name"],"asset/images/destination/image$idImage.jpg");
                if($idImage){
                    $_SESSION["msg"]="Destination added";
                    header("location:/?path=destination&action=formAdd");
                }
                else{
                    $_SESSION["error"]="Failed to add the destionation";
                    header("location:?path=destination&action=formAdd");
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
