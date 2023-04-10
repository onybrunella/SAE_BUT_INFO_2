<?php require "view_begin.php";?>
<div class="b">
<section class="py-5 my-5">
    <a class="ba" href="?controller=compte&action=planning_p" >
        Retour
    </a>
                    <h3 class="mb-4">Créneaux disponibles</h3>

</section>

        <?php foreach ($data as $d) : ?>
            <input type="checkbox" name="creneaux"><?=$d['nom']?>-<?=$d['capacité']?>:
            <div class="b1"><?=$d['debut']?> - <?=$d['fin']?></div></input>
        <?php endforeach ?>
        <div class="j"><input type="submit" value="confirmer" name="submit""></div>
        <?php
              if(isset($_POST['submit'])){

             if(!empty($_POST['creneaux'])){
            foreach($_POST['creneaux'] as $value){
              $d=$value;
            }}}
              ?>

 <details class="s">
    <summary>Mes reservation</summary>
<table>
    <thead>
    <tr>
        <th>Stand</th>
        <th>Créneaux</th>
        <th>Déscription</th>
        <th class="sansBordure"></th>
        <th class="sansBordure"></th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td><?=$d?> </td>

            <td class="sansBordure">

            </td>
        </tr>

    </tbody>
</table>
</détail>
</div>
<?php require "view_end.php"; ?>
