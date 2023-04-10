<?php


abstract class Controller
{
    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        //On regarde s'il y a un paramètre action dans l'url correspondant à une action du controller
        if (isset($_GET['action']) and method_exists($this, "action_" . $_GET["action"])) {
            //Si c'est le cas, on appelle cette action
            $action = "action_" . $_GET["action"];
            $this->$action();
        } else {
            //Sinon, on appelle l'action par défaut
            $this->action_default();
        }
    }

    /**
     * Action par défaut du controller
     */
    abstract public function action_default();

    /**
     * Affiche la vue
     * @param string $vue qui indique le nom de la vue
     * @param array $data qui contient les données à passer à la vue
     * @return void
     */
    protected function render($vue, $data = [])
    {
        //On extrait les données à afficher
        extract($data);

        //On teste si la vue existe
        $file_name = "Views/view_" . $vue . '.php';
        if (file_exists($file_name)) {
            //Si c'est le cas, on l'affiche
            include $file_name;
        } else {
            //Sinon, on affiche une erreur
            $this->action_error("La vue n'existe pas !");
        }
        die();
    }

    /**
     * Méthode affichant une page d'erreur
     * @param string $message Message d'erreur à afficher
     * @return aucun
     */
    protected function action_error($message = '')
    {
        $data = [
            'title' => "Error",
            'message' => $message,
        ];
        $this->render("message", $data);
    }
}
