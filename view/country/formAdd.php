<?php
$title="Adding a new Country";
ob_start();?>
<div class="container-fluid">
<div class="row  col-md-6 col-sm-8 col-12 mx-auto my-3">
    
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
    <h1>Adding a new country</h1>
<form method="post" action="?path=country&action=processFormAdd">

  <div class="form-floating mb-3">
    <input required minlength="2" name="name" type="text" class="form-control" id="inputName" placeholder="name of the country">
    <label for="inputName">Country name</label>
  </div>

    <div class="form-floating mb-3">
        <input required minlength="3" min="0" name="population" type="number" class="form-control" id="inputPopulation" placeholder="Population">
        <label for="inputPopulation">Population</label>
    </div>
    <div class="form-floating mb-3">
        <input required minlength="2" name="region" type="text" class="form-control" id="inputRegion" placeholder="region">
        <label for="inputRegion">Region name</label>
    </div>
    <div class="form-floating mb-3">
        <input required minlength="2" name="subregion" type="text" class="form-control" id="inputSubregion" placeholder="Subregion name">
        <label for="inputSubregion">Subregion name</label>
    </div>
    <div class="form-floating mb-3">
        <input required minlength="2" name="capital" type="text" class="form-control" id="inputCapital" placeholder="Capital name">
        <label for="inputCapital">Capital name</label>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<?php $content=ob_get_clean();
require("view/template.php");
