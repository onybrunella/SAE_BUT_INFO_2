<?php

class Controller_home extends Controller
{
    /**
     * Affiche la page d'accueil
     */
	public function action_home() {
		$m = Model::getModel();
		$data = [];
		$this->render("home", $data);
	}

    /**
     * Action par défaut du controller
     */
	public function action_default() {
		$this->action_home();
	}

    /**
     * Action qui affiche la page FAQ
     */
    public function action_faq() {
        $m = Model::getModel();
        $data = [];
        $this->render("faq", $data);
    }
}
