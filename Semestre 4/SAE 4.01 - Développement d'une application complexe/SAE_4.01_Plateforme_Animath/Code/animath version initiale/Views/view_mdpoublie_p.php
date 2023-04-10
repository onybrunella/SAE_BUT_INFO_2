<?php require "view_begin.php";?>
<div class="center">
    <h1>Mot de passe oublié</h1>
    <form method="post" action="?controller=mdpoublie&action=nvMdp_p">
        <div class="texte">
            <input type="text" name="adr" required>
            <span></span>
            <label>Adresse e-mail</label>
        </div>
        <input type="submit" value=" Valider">
    </form>
</div>
<?php require "view_end.php"; ?>

