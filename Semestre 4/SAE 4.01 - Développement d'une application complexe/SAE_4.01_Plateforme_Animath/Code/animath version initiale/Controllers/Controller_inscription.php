<?php

class Controller_inscription extends Controller
{
    /**
     * Affiche la page d'inscription d'un enseignant
     */
	public function action_inscription_p() {
		$m = Model::getModel();
		$message = "Veuillez renseigner vos informations.";
		$data = ["message"=>$message];
		$this->render("inscription_p", $data);
	}

    /**
     * Action par défaut du controller
     */
	public function action_default() {
		$this->action_inscription_p();
	}

    /**
     * Affiche la page d'inscription d'un superviseur
     */
	public function action_inscription_s() {
		$m = Model::getModel();
		$message = "Veuillez renseigner vos informations.";
		$data = ["message"=>$message];
		$this->render("inscription_s", $data);
	}

    /**
     * Fonction qui vérifie s'il y a une erreur d'inscription pour un professeur
     */
	public function check_inscription_p(){
		if (! isset($_SESSION["inscrit"])){
			$message = "Il y a eu une erreur!";
			$data = ["message"=>$message];
			$this->render("inscription_p", $data);
		}
	}

    /**
     * Fonction qui vérifie s'il y a une erreur d'inscription pour un exposant
     */
    public function check_inscription_e(){
        if (! isset($_SESSION["inscrit"])){
            $message = "Il y a eu une erreur!";
            $data = ["message"=>$message];
            $this->render("inscription_e", $data);
        }
    }

    /**
     * Fonction qui vérifie s'il y a une erreur d'inscription pour un superviseur
     */
    public function check_inscription_s(){
        if (! isset($_SESSION["inscrit"])){
            $message = "Il y a eu une erreur!";
            $data = ["message"=>$message];
            $this->render("inscription_s", $data);
        }
    }

    /**
     * Action qui créer un compte professeur
     */
	public function action_creation_p() {
        // Si les champs sont remplis et pas vides
		if (isset($_POST["nom"]) && trim($_POST["nom"]) !== "" && isset($_POST["prenom"]) && trim($_POST["prenom"]) !== "" && isset($_POST["adr"]) && trim($_POST["adr"]) !== "" && preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $_POST["adr"]) && isset($_POST["mdp"]) && trim($_POST["mdp"]) !== ""){
			$liste = ['nom', 'prenom', 'adr', 'mdp'];
			$infos = [];
			foreach ($liste as $cle) {
				$infos[$cle] = $_POST[$cle];
			}
			$m = Model::getModel();
            // On ajoute le compte dans la base de données
			$ok = $m->addProfesseur($infos);
            // Si le compte a été ajouté
			if ($ok) {
                // On affecte true
				$_SESSION["inscrit"]=true;
			}
		}
        // On vérifie s'il y a une erreur
		$this->check_inscription_p();
		$message = "Votre compte a été créé!";
		$data = ["message"=>$message];
        // On affiche la page de connexion
		$this->render('login_p', $data);
	}

    public function action_creation_s() {
        // Si les champs sont remplis et pas vides
        if (isset($_POST["nom"]) && trim($_POST["nom"]) !== "" && isset($_POST["adr"]) && trim($_POST["adr"]) !== "" && isset($_POST["mdp"]) && trim($_POST["mdp"]) !== "" && isset($_POST["prenom"]) && trim($_POST["prenom"]) !== ""){
            $liste = ['nom', 'adr', 'mdp', 'prenom'];
            $infos = [];
            foreach ($liste as $cle) {
                $infos[$cle] = $_POST[$cle];
            }
            $m = Model::getModel();
            // On ajoute le compte dans la base de données
            $ok = $m->addSuperviseur($infos);
            // Si le compte a été ajouté
            if ($ok) {
                // On affecte true
                $_SESSION["inscrit"]=true;
            }
        }
        // On vérifie s'il y a une erreur
        $this->check_inscription_s();
        $infos = $m->getInfosS($_SESSION["adr"]);
        $message = "Le compte a été créé!";
        $data = ["message"=>$message, "infos"=>$infos];
        // On affiche la page de connexion
        $this->render('inscription_s', $data);
    }
}
