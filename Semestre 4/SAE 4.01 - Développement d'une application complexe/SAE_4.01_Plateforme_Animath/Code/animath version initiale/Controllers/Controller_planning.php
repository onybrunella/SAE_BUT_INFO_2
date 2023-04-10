<?php

class Controller_planning extends Controller
{
    /**
     * Action qui permet d'importer un fichier csv
     */
    public function action_import() {
        $m = Model::getModel();
        // Si le superviseur clique sur importer
        if (isset($_POST['import'])) {
            // Si ce n'est pas vide
            if (! empty($_FILES['fichier']["name"])) {
                $fileName = $_FILES['fichier']["name"];
                // On ouvre le fichier
                $file = fopen($fileName, "r");
                $count = 0;
                // On récupère les lignes du fichier jusqu'à la fin du fichier
                while (($donnees = fgetcsv($file, null, ",")) !== FALSE) {
                    $count ++;
                    // Si c'est l'entête, on saute la ligne
                     if ($count==1) {continue;}
                    // Si l'exposant est déjà dans la base de données, on saute la ligne
                    if ($m->getInfosE($donnees[1])) {continue;}
                    // Sinon, on insère les informations dans les tables correspondantes
                    $m->insererInfosPlanning($donnees[1], $donnees[11], $donnees[12], $donnees[13], $donnees[14], $donnees[15]);
                    $m->addExposant($donnees[1], $donnees[6], $donnees[4], $donnees[5], $donnees[2], $donnees[3], $donnees[7]);

                    ini_set('max_execution_time', '300');
                    set_time_limit(300);
                    if ($donnees[11] == "non") {continue;}
                    $debut = strtotime("9:00:00");
                    $fin = strtotime($donnees[14]);
                    while ($debut+intval($donnees[12])*60 <= $fin) {
                        $m->insererCreneau($donnees[1], date("H:i:s", $debut), date("H:i:s", $debut+intval($donnees[12])*60), "Jeudi");
                        $m->insererCreneau($donnees[1], date("H:i:s", $debut), date("H:i:s", $debut+intval($donnees[12])*60), "Vendredi");
                        $debut += (intval($donnees[12])+intval($donnees[13]))*60;
                    }

                    $debut2 = strtotime($donnees[15]);
                    $fin = strtotime("18:00:00");
                    while($debut2+intval($donnees[12])*60 <= $fin){
                        $m->insererCreneau($donnees[1], date("H:i:s", $debut2), date("H:i:s", $debut2+intval($donnees[12])*60), "Jeudi");
                        $m->insererCreneau($donnees[1], date("H:i:s", $debut2), date("H:i:s", $debut2+intval($donnees[12])*60), "Vendredi");
                        $debut2 += (intval($donnees[12])+intval($donnees[13]))*60;
                    }
                }
                $id = $m->getIdS($_SESSION['adr']);
                $m->insererModif($id["id_superviseur"], 'INSERT', "", $fileName);
                // On ferme le fichier
                fclose($file);
                $message = "Le fichier a été importé avec succès.";
            }
            else {
                $message = "Aucun fichier n'a été sélectionné.";
            }
        }
        else {
            $message = "Veuillez importer votre fichier .csv";
        }
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
     * Action par défaut du controller
     */
    public function action_default() {
        $this->action_import();
    }

    /**
     * Action qui permet de supprimer un créneau
     */
    public function action_remove() {
        $m = Model::getModel();
        if (isset($_GET["id_creneau"]) and preg_match("/^[1-9]\d*$/", $_GET["id_creneau"]) and isset($_GET["nom"]) and isset($_GET["deb"]) and isset($_GET["fin"])) {
            $id = $_GET["id_creneau"];
            $m->removeCreneau($id);
            $ids = $m->getIdS($_SESSION['adr']);
            $donnees = 'Exposant : '. $_GET["nom"] . "\n" . 'Créneau : ' . $_GET['deb'] . ' - ' . $_GET['fin'] ;
            $m->insererModif($ids["id_superviseur"], 'DELETE', $donnees, "");
        }
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
     * Action qui permet de filtrer
     */
    public function action_rechercher() {
        $m = Model::getModel();
        $data = $m->getInfosPlanning($_POST["jour"], $_POST["debut"], $_POST["fin"], $_POST["niveau"]);
        $this->render("choix", $data);
    }
}