<?php require "view_begin.php";?>
<div class="center">
    <h1>Connexion</h1>
    <h6><?=$message?></h6>
    <form action="?controller=login&action=connexion_p" method="post">
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
        <div class="mdpoublie"> <a href="?controller=mdpoublie&action=mdpoublie_p">Mot de passe oublié?</a></div>
        <input type="submit" value="Connexion">
        <div class="inscription">
            Pas de compte? <a href="?controller=inscription&action=inscription_p">Inscription</a>
        </div>
        <button type="button" onclick="togglePassword()">Afficher le mot de passe</button>
    </form>
</div>
<?php require "view_end.php";?>


