<?php require "view_begin.php";?>
<div class="center">
    <h1>Planning exposant</h1>
    <form action="?controller=login&action=connexion_e" method="post">
        <div class="stand">
            <select name="stand" class="stand-select">
                <option disabled selected>--Veuillez choisir votre stand--</option>
                <?php foreach ($exposants as $v) :?>
                <option name="stand" value="<?=$v?>"><?=$v?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br><br>
        <input type="submit" value="Accéder au planning">
    </form>
</div>
<?php require "view_end.php"; ?>