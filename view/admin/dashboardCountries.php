<?php $title="Country Dashboard"?>
<?php ob_start();?>
<div class="container-fluid row">
    <?php require("view/fragments/menuDashboard.php"); ?>
    <div class="container col_9">
        <h1>Dashboard Countries</h1>
        <table>
            <theader>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Population</th>
                    <th>Region</th>
                    <th>Subregion</th>
                    <th>Flag</th>
                    <th>Capital</th>
                    <th>Actions</th>
                </tr>
            </theader>
            <tbody>
                <?php foreach($countries as $country){?>
                    <tr>
                        <td><?=$country->getIdCountry()?></td>
                        <td><?=$country->getName()?></td>
                        <td><?=$country->getPopulation()?></td>
                        <td><?=$country->getRegion() ?></td>
                        <td><?=$country->getSubregion() ?></td>
                        <td><?=$country->getFlag()?></td>
                        <td><?=$country->getFlag()?></td>
                        <td><a href="?path=country&action=FormUpdate&id=<?=$country->getIdCountry()?>" class="btn btn-success">Update</a>
                         <form action="?path=country&action=processFormDelete" method="post">
                             <input type="hidden" name="id" value="<?=$country->getIdCountry()?>">
                             <button class="btn btn-danger">Delete</button>
                         </form></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</div>