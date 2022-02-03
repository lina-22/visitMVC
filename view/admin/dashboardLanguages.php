<?php $title="Dashboard"; ?>
<?php ob_start() ?>

<div class="container-fluid row">
    <?php require ("view/fragements/menuDashboard.php") ?>
     <div class= "container col-9" >
         <h1>Dashboard Languages</h1>
         <table class="table my-3">
             <theader>
                 <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Actions</th>
                 </tr>
             </theader>
             <tbody>
              <?php foreach ($languages as $language){?>
                <td><?=$language->getIdLanguage() ?></td>
                <td><?=$language->getIdName()?></td>
                <td><a href="?path=language&action=formUpdate&id=<?=$language->getIdLanguage()?>" class="btn btn-success">Update</a></td>
                <form action="?path=language&action=processDelete" method="post">
                    <input type="hidden" name="id" value="<?= $language->getIdLanguage()?>">
                    <button class="btn btn_danger">Delete</button>
                </form>
              <?php } ?>   
             </tbody>

         </table>

     </div>

</div>


<?php $content = ob_get_clean()?>
<?php require("viex/template.php")?>