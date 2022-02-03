<?php
$title=$destination->getName();
ob_start();
?>
<div class="container">
    <main>
    <h1><?=$destination->getName()?></h1>
    <section>
    <!-- TODO Carousel -->
    </section>
    <section>
        <!-- Infos destinations -->
        <div class="row">
            <div class="col-3">
                Name : <?= $destination->getName()?>
            </div>
            <div class="col-3">
                Opening Date : <?=$destination->getOpeningDate()?>
            </div>
            <div class="col-3">
                Closing Date : <?=$destination->getClosingDate() ?? "NA"?>
            </div>
        </div>
        <div class="row mt-3">
            <p>
                Description : 
                <?= $destination->getDescription()?>
            </p>
        </div>
    </section>
    <section>
        <form action="?path=reservation&action=processToBasket" method="POST">
            <input type="hidden" name="idDestination" value="<?=$destination->getIdDestination()?>">
            <label for="">Number of seat </label>
            <input type="number" name="number">
            <label for="">Departure date</label>
            <input type="date" name="departureDate" min="<?=$destination->getOpeningDate()?>">
            <button>Add to the basket</button>
        </form>
    </section>
    </main>
</div>
<?php
$content=ob_get_clean();
require("view/template.php");