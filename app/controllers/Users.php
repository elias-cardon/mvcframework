<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";

            //On valide si le pseudo a des lettres/chiffres
            if (empty($data['username'])){
                $data['usernameError'] = 'Veuillez renseigner le pseudonyme.';
            } elseif (!preg_match($nameValidation, $data['username'])){
                $data['usernameError'] = 'Veuillez utiliser que des lettres et des nombres.';
            }

            //On valide l'email
            if (empty($data['email'])){
                $data['emailError'] = 'Veuillez renseigner une adresse email.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = 'Veuillez renseigner le bon format';
            } else{
                //On vérifie d'abord si l'email existe
                if ($this->userModel->findUserByEmail($data['email'])){
                    $data['emailError'] = 'Cet adresse email est déjà utilisée.';
                }
            }
        }

        $this->view('users/register', $data);
    }

    public function login(){
        $data = [
            'title' => 'Connexion',
            'usernameError' => '',
            'passwordError' => ''
        ];

        $this->view('users/login', $data);
    }
}