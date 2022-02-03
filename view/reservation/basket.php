<?php
$title="My basket";
ob_start();
?>
    <h1>My basket</h1>
    <?php
    if(isset($_SESSION["error"])){
        ?>
        <div class="alert alert-danger my-2"><?=$_SESSION["error"]?></div>
        <?php
        unset($_SESSION["error"]);
    }
    else if(isset($_SESSION["msg"])){
        ?>
        <div class="alert alert-success my-2"><?=$_SESSION["msg"]?></div>
        <?php
        unset($_SESSION["msg"]);
    }
    ?>
    <ul>
    
        <?php 
        if($basket):
        foreach($basket??[] as $index=>$aSerializeReservation): 
            $aReservation=unserialize($aSerializeReservation);
            ?>
            
        <li>Destination : <?=$aReservation->destination($monPDO)->getName();?> 
        Depature date : <?=$aReservation->getDepartureDate(); ?>
        Number of seat : <?=$aReservation->getNumber();?>
        <form action="?path=reservation&action=removeFromBasket" method="post">
            <input type="hidden" required name="numLine" value="<?=$index?>">
            <button class="btn btn-danger">Remove</button>
        </form>
        </li>
        <?php 
        endforeach; 
        endif;
            ?>
    </ul>
    <form action="?path=reservation&action=submitBasket" method="post">
        <button class="btn btn-success">Submit Basket</button>
    </form>
<?php
$content=ob_get_clean();
require("view/template.php");
?>