<?php

//Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvcframework');

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT
define('URLROOT', 'http://localhost/mvcframework'); //Lien à changer à chaque nouveau projet -- URLROOT permet de ne pas avoir à copier-coller le l'url à chaque fois
//Le CSS ne marchait pas si je mettais pas le http:// dans l'url

//Nom du site
define('SITENAME', 'MVC Framework');