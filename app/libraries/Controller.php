<?php

//Load the model et the view
class Controller {
    public function model($model){
        //Require le fichier model
        require_once '../app/models/' . $model . '.php';
         //Instancie le model
        require new $model();
    }

    //Charge le view (Check si fichier du view existe)
    public function view($view, $data = []){
        if (file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            die("Cette vue n'existe pas.");
        }
    }
}