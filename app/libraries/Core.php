<?php

//Class Core
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    { //Un construct permet d'initialiser les propriétés d'un objet lors de sa création. PHP appelle automatiquement cette fonction lorsque vous créez un objet à partir d'une classe.
        $url = $this->getUrl();

        if (isset($url[0])){
            if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){ //ucwords = Met en majuscule la première lettre de tous les mots
                //Va set un nouveau controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]); //unset = Détruit une variable
            }
        }
        //Require le controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        //Check la seconde partie de l'url
        if (isset($url[1])){
            if (method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //Get parameters
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //rtrim = Supprime les espaces (ou d'autres caractères) de fin de chaîne

            $url = filter_var($url, FILTER_SANITIZE_URL); //filter_var = Filtre une variable avec un filtre spécifique
            $url = explode('/', $url); //explode = Scinde une chaîne de caractères en segments
            return $url;
        }
    }
}