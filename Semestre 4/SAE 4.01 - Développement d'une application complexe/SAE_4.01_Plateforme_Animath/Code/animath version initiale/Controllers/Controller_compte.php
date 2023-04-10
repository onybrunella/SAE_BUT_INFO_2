<?php

class Controller_compte extends Controller
{
    /**
     * Affiche le compte de l'enseignant
     */
    public function action_compte_p() {
        $m = Model::getModel();
        $data = $m->getInfosP($_SESSION["adr"]);
        $this->render("compte_p", $data);
    }

    /**
     * Action par défaut du controller
     */
    public function action_default()
    {
        $this->action_compte_p();
    }

    /**
     * Affiche le compte de l'exposant
     */
    public function action_compte_e() {
        $m = Model::getModel();
        $nom = $m->getInfosE($_SESSION["stand"]);
        $infosJ = $m->getInfosReserv($_SESSION["stand"], 'Jeudi');
        $infosV = $m->getInfosReserv($_SESSION["stand"], 'Vendredi');
        $data = ["nom"=>$nom, "infosJ"=>$infosJ, "infosV"=>$infosV];
        $this->render("compte_e", $data);
    }

    /**
     * Affiche le compte du superviseur
     */
    public function action_compte_s() {
        $m = Model::getModel();
        $data = $m->getInfosS($_SESSION["adr"]);
        $this->render("compte_s", $data);
    }

    /**
     * Action qui permet de se déconnecter
     */
    public function action_deconnexion() {
        session_destroy();
        $data = [];
        // On retourne à la page d'accueil
        $this->render("home", $data);
    }

    /**
     * Affiche la page de planning de l'enseignant
     */
    public function action_planning_p() {
        $m = Model::getModel();
        $infos = $m->getInfosP($_SESSION["adr"]);
        $exposants = $m->getExposant();
        $data = [
            "infos"=>$infos, "exposants"=>$exposants
        ];
        $this->render("planning_p", $data);
    }

    /**
     * Action qui permet de modifier les informations du professeur
     */
    public function action_update_p() {
        $m = Model::getModel();
        // Si les champs sont remplis
        if (isset($_POST["etablissement"]) and isset($_POST["ville"]) and isset($_POST["niveau"]) and isset($_POST["nb"])) {
            $infos = [];
            $noms = ['etablissement', 'ville', 'niveau', 'nb'];
            foreach ($noms as $v) {
                if (isset($_POST[$v])) {
                    $infos[$v] = $_POST[$v];
                }
            }
            // On met à jour les informations dans la base de données
            $m->updateCompteP($infos, $_SESSION["adr"]);
        }
        // On récupère les données mises à jour
        $data = $m->getInfosP($_SESSION["adr"]);
        // On retourne à la page de compte
        $this->render("compte_p", $data);
    }

    /**
     * Action qui permet de modifier les informations du superviseur
     */
    public function action_update_s() {
        $m = Model::getModel();
        // Si les champs sont remplis
        if (isset($_POST["mdp"])) {
            // On met à jour les informations dans la base de données
            $m->updateCompteS($_POST["mdp"], $_SESSION["adr"]);
        }
        // On récupère les données mises à jour
        $data = $m->getInfosS($_SESSION["adr"]);
        // On retourne à la page de compte
        $this->render("compte_s", $data);
    }

    /**
     * Action qui permet d'afficher la page de création d'un compte superviseur
     */
    public function action_creerS() {
        $m = Model::getModel();
        $infos = $m->getInfosS($_SESSION["adr"]);
        $message = "Veuillez remplir les champs ci-dessous.";
        $data = [ "message"=>$message, "infos"=>$infos ];
        $this->render("inscription_s", $data);
    }

    /**
     * Action qui permet d'afficher la page des modifications appliquées par les superviseurs
     */
    public function action_modApp() {
        $m = Model::getModel();
        $modif = $m->getModification();
        $infos = $m->getInfosS($_SESSION["adr"]);
        $data = [ "modif"=>$modif, "infos"=>$infos ];
        $this->render("modifApp", $data);
    }

    /**
     * Action qui permet d'afficher la page de planning
     */
    public function action_planning_s() {
        $m = Model::getModel();
        $infos = $m->getInfosS($_SESSION["adr"]);
        $infosE = $m->getExposant();
        foreach ($infosE as $v) {
            $infosEJ[$v] = $m->getInfosDE($v, "Jeudi");
            $infosEV[$v] = $m->getInfosDE($v, "Vendredi");
        }
        $message = "Veuillez importer votre fichier .csv";
        $data = ["infos"=>$infos, "message"=>$message, "infosEJ"=>$infosEJ, "infosEV"=>$infosEV, "infosE"=>$infosE ];
        $this->render("planning_s", $data);
    }

    /**
     * Affiche la page des réservations de l'enseignant
     */
    public function action_reservation() {
        $m = Model::getModel();
        $data = $m->getInfosP($_SESSION["adr"]);
        $this->render("reservations", $data);
    }
}