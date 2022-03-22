<?php

//Class Core
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //rtrim = Supprime les espaces (ou d'autres caractères) de fin de chaîne

            //Permet de filtrer les variables en string/nombres
            $url = filter_var($url, FILTER_SANITIZE_URL); //filter_var = Filtre une variable avec un filtre spécifique
            $url = explode('/', $url); //explode = Scinde une chaîne de caractères en segments
        }
    }
}