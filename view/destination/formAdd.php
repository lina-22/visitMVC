<?php
$title="Add a new destination";
ob_start();
?>
    <div class="container-fluid">
        <div class="row col-md-6 col-sm-8 col-12 mx-auto my-3">
            
            <?php
            if(isset($_SESSION["error"])){
                ?>
                <div class="alert alert-danger"><?=$_SESSION["error"]?></div>
                <?php
                unset($_SESSION["error"]);
            }
            else if(isset($_SESSION["msg"])){
                ?>
                <div class="alert alert-success"><?=$_SESSION["msg"]?></div>
                <?php
                unset($_SESSION["msg"]);
            }
            ?>
            <h1>Adding a new destination</h1>
        <form method="post" action="?path=destination&action=processFormAdd" enctype="multipart/form-data">

        <div class="form-floating mb-3">
            <input required minlength="2" name="name" type="text" class="form-control" id="floatingInput" placeholder="Destination name">
            <label for="floatingInput">destination name</label>
        </div>
        <div class="form-floating mb-3">
            <input required name="openingDate" type="date" class="form-control" id="opening" >
            <label for="opening">opening date</label>
        </div>

        <div class="form-floating mb-3">
            <input name="closingDate" type="date" class="form-control" id="closing" >
            <label for="closing">closing date</label>
        </div>
        
        <div class="form-floating mb-3">
            <input name="duration" type="number" min="1" max="60" class="form-control" id="duration" >
            <label for="duration">journey duration</label>
        </div>
        
        <div class="form-floating mb-3">
            <input name="price" type="number" class="form-control" id="price" >
            <label for="price">price</label>
        </div>

        <div class="form-floating">
        <select name="idCountry" required class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option disabled selected>select a country</option>
            <?php foreach($countries as $country) : ?>
            <option value="<?=$country->getIdCountry();?>"><?=$country->getName()?></option>
            <?php endforeach;?>
        </select>
        <label for="floatingSelect">Country</label>
        </div>

        <div class="form-floating">
        <textarea class="form-control" name="description" required placeholder="description here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Description</label>
        </div>
        
       
            <input class="form-control" type="file" name="imageDestination" accept="image/*" id="fileImage">
             
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
<?php
$content=ob_get_clean();
require("view/template.php");
?>