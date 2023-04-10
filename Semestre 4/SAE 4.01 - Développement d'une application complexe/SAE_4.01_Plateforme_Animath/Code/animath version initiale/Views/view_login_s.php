<?php require "view_begin.php";?>
<div class="center">
    <h1>Connexion</h1>
    <h6><?=$message?></h6>
    <form action="?controller=login&action=connexion_s" method="post">
        <div class="texte">
            <input type="text" name="adr" required>
            <span></span>
            <label>Adresse mail</label>
        </div>
        <div class="texte">
            <input type="password" name="mdp" required>
            <span></span>
            <label>Mot de passe</label>
        </div>
        <div class="mdpoublie"> <a href="?controller=mdpoublie&action=mpoublie_s">Mot de passe oublié?</a></div>
        <input type="submit" value="Connexion">
    </form>
</div>
<?php require "view_end.php"; ?>
