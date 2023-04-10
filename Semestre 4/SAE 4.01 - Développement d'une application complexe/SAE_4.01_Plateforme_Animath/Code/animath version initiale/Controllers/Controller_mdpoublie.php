<?php

class Controller_mdpoublie extends Controller
{
    /**
     * Affiche la page de mot de passe oublié de l'enseignant
     */
	public function action_mdpoublie_p() {
		$m = Model::getModel();
		$data = [];
		$this->render("mdpoublie_p", $data);
	}

    /**
     * Action par défaut du controller
     */
	public function action_default() {
		$this->action_mdpoublie_p();
	}

    /**
     * Affiche la page de mot de passe oublié du superviseur
     */
    public function action_mdpoublie_s() {
        $m = Model::getModel();
        $data = [];
        $this->render("mdpoublie_s", $data);
    }

    /**
     * Affiche la page de mot de passe oublié de l'exposant
     */
    public function action_mdpoublie_e() {
        $m = Model::getModel();
        $data = [];
        $this->render("mdpoublie_e", $data);
    }

    /**
     * Action qui envoie un mail à l'enseignant avec le nouveau mot de passe
     */
    public function action_nvMdp_p() {
        // Si l'adresse mail a été renseigné
        if (isset($_POST['adr'])) {
            // On créé un nouveau mot de passe
            $mdp = uniqid();
            $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
            $subject = 'Mot de passe oublié';
            $message = "Bonjour, voici votre nouveau mot de passe : $mdp";

            // Si le mail a été envoyé
            if (mail($_POST['adr'], $subject, $message)) {
                $m = Model::getModel();
                // On modifie le mot de passe dans la base de données
                $ok = $m->nvMdpP($hashedMdp, $_POST['adr']);
                if ($ok) {
                    $message = "E-mail envoyé";
                }
                else {
                    $message = "Une erreur est survenue";
                }
            }
        }
        // Sinon, on affiche une erreur
        else {
            $message = "Une erreur est survenue";
        }
        $data = ["message"=>$message];
        // On retourne sur la page de connexion
        $this->render("login_p", $data);
    }

    /**
     * Action qui envoie un mail à l'exposant avec le nouveau mot de passe
     */
    public function action_nvMdp_e() {
        // Si l'adresse mail a été renseigné
        if (isset($_POST['adr'])) {
            // On créé un nouveau mot de passe
            $mdp = uniqid();
            $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
            $subject = 'Mot de passe oublié';
            $message = "Bonjour, voici votre nouveau mot de passe : $mdp";

            // Si le mail a été envoyé
            if (mail($_POST['adr'], $subject, $message)) {
                $m = Model::getModel();
                // On modifie le mot de passe dans la base de données
                $ok = $m->nvMdpE($hashedMdp, $_POST['adr']);
                if ($ok) {
                    $message = "E-mail envoyé";
                }
                else {
                    $message = "Une erreur est survenue";
                }
            }
        }
        // Sinon, on affiche une erreur
        else {
            $message = "Une erreur est survenue";
        }
        $data = ["message"=>$message];
        // On retourne sur la page de connexion
        $this->render("login_e", $data);
    }

    /**
     * Action qui envoie un mail au superviseur avec le nouveau mot de passe
     */
    public function action_nvMdp_s() {
        // Si l'adresse mail a été renseigné
        if (isset($_POST['adr'])) {
            // On créé un nouveau mot de passe
            $mdp = uniqid();
            $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
            $subject = 'Mot de passe oublié';
            $message = "Bonjour, voici votre nouveau mot de passe : $mdp";

            // Si le mail a été envoyé
            if (mail($_POST['adr'], $subject, $message)) {
                $m = Model::getModel();
                // On modifie le mot de passe dans la base de données
                $ok = $m->nvMdpS($hashedMdp, $_POST['adr']);
                if ($ok) {
                    $message = "E-mail envoyé";
                }
                else {
                    $message = "Une erreur est survenue";
                }
            }
        }
        // Sinon, on affiche une erreur
        else {
            $message = "Une erreur est survenue";
        }
        $data = ["message"=>$message];
        // On retourne sur la page de connexion
        $this->render("login_s", $data);
    }
}