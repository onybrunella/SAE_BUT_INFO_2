<?php

class Controller_login extends Controller
{
    /**
     * Affiche la page de connexion d'un enseignant
     */
	public function action_login_p() {
		$m = Model::getModel();
		$message = "Veuillez renseigner votre identifiant et mot de passe.";
		$data = ["message"=>$message];
		$this->render("login_p", $data);
	}

    /**
     * Action par défaut du controller
     */
	public function action_default() {
		$this->action_login_p();
	}

    /**
     * Fonction qui vérifie si le compte d'un exposant existe et affiche une erreur
     */
	public function check_connection_e(){
		if (! isset($_SESSION["connecte"])){
			$data = [];
			$this->render("login_exp", $data);
		}
	}

    /**
     * Fonction qui vérifie si le compte d'un enseignant existe et affiche une erreur
     */
	public function check_connection_p(){
		if (! isset($_SESSION["connecte"])){
			$message = "Adresse mail ou mot de passe incorrect!";
			$data = ["message"=>$message];
			$this->render("login_p", $data);
		}
	}

    /**
     * Fonction qui vérifie si le compte d'un superviseur existe et affiche une erreur
     */
	public function check_connection_s(){
		if (! isset($_SESSION["connecte"])){
			$message = "Adresse mail ou mot de passe incorrect!";
			$data = ["message"=>$message];
			$this->render("login_s", $data);
		}
	}

    /**
     * Affiche la page de connexion d'un superviseur
     */
	public function action_login_s() {
		$m = Model::getModel();
		$message = "Veuillez renseigner votre identifiant et mot de passe.";
		$data = ["message"=>$message];
		$this->render("login_s", $data);
	}

    /**
     * Affiche la page de connexion d'un exposant
     */
	public function action_login_exp() {
		$m = Model::getModel();
        $exposants = $m->getExposant();
		$data = ["exposants"=>$exposants];
		$this->render("login_exp", $data);
	}

    /**
     * Action qui affiche le compte de l'enseignant
     */
	public function action_connexion_p() {
        // Si les champs sont remplis et pas vides
		if (isset($_POST["adr"]) && trim($_POST["adr"]) !== "" && isset($_POST["mdp"]) && trim($_POST["mdp"]) !== "") {
			$m = Model::getModel();
            // Si l'adresse mail est dans la base de données
            if ($m->isInDataBaseP($_POST["adr"])) {
                $mdp = $m->loginP($_POST["adr"]);
                // On vérifie si le mot de passe renseigné est correct
                if (password_verify($_POST["mdp"], $mdp["mot_de_passe"])) {
                    $_SESSION["connecte"] = true;
                }
            }
		}
        // On vérifie s'il y a des erreurs
		$this->check_connection_p();
		$data = $m->getInfosP($_POST["adr"]);
        $_SESSION["adr"] = $_POST["adr"];
        // On affiche le compte
		$this->render("compte_p", $data);
	}

    /**
     * Action qui affiche le compte de l'exposant
     */
	public function action_connexion_e() {
        // Si les champs sont remplis et pas vides
		if (isset($_POST["stand"]) && trim($_POST["stand"]) !== "") {
            $_SESSION["connecte"]=true;
		}
        $m = Model::getModel();
        // On vérifie s'il y a des erreurs
		$this->check_connection_e();
        $_SESSION["stand"] = $_POST["stand"];
        $nom = $m->getInfosE($_SESSION["stand"]);
        $infosJ = $m->getInfosReserv($_SESSION["stand"], 'Jeudi');
        $infosV = $m->getInfosReserv($_SESSION["stand"], 'Vendredi');
        $data = ["nom"=>$nom, "infosJ"=>$infosJ, "infosV"=>$infosV];
        // On affiche le compte
		$this->render("compte_e", $data);
	}

    /**
     * Action qui affiche le compte du superviseur
     */
	public function action_connexion_s() {
        // Si les champs sont remplis et pas vides
        if (isset($_POST["adr"]) && trim($_POST["adr"]) !== "" && isset($_POST["mdp"]) && trim($_POST["mdp"]) !== "") {
            $m = Model::getModel();
            // Si l'adresse mail est dans la base de données
            if ($m->isInDataBaseS($_POST["adr"])) {
                $mdp = $m->loginS($_POST["adr"]);
                // On vérifie si le mot de passe renseigné est correct
                if ($_POST["mdp"] == $mdp["mot_de_passe"]) {
                    $_SESSION["connecte"] = true;
                }
            }
        }
        // On vérifie s'il y a des erreurs
		$this->check_connection_s();
		$data = $m->getInfosS($_POST["adr"]);
        $_SESSION["adr"] = $_POST["adr"];
        // On affiche le compte
		$this->render("compte_s", $data);
	}
	
	public function togglePassword() {
        var x = document.getElementById("mdp");
        if (x.type === "password") {
                x.type = "text";
        }
        else {
            x.type = "password";
        }
    }
}
