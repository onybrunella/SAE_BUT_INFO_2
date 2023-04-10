<?php
session_start();
//Pour avoir accès à la fonction e()
require_once "Utils/functions.php";

//Pour inclure le modèle
require_once "Models/Model.php";

//Pour inclure tous les controllers
require_once "Controllers/Controller.php";
require_once "Controllers/Controller_home.php";
require_once "Controllers/Controller_login.php";
require_once "Controllers/Controller_inscription.php";
require_once "Controllers/Controller_mdpoublie.php";
require_once "Controllers/Controller_compte.php";
require_once "Controllers/Controller_planning.php";

//Liste des controllers
$controllers = ["home", "login", "inscription", "mdpoublie", "compte", "planning"];

//Affectation du controller par défaut
$controller_default = "home";

//On teste si le paramètre controller existe et correspond à un controller de la liste $controllers
if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
}
else {
    $nom_controller = $controller_default;
}

//On détermine le nom de la classe du controller
$nom_classe = 'Controller_' . $nom_controller;

//On détermine le nom du fichier contenant la définition du controller
$nom_fichier = 'Controllers/' . $nom_classe . '.php';

//On regarde si le fichier est accessible en lecture
if (is_readable($nom_fichier)) {
    //Si c'est le cas, on l'inclut et on instancie un objet de cette classe
    require_once $nom_fichier;
    new $nom_classe();
} else {
    //Sinon, on affiche une erreur
    die("Error 404: not found!");
}

