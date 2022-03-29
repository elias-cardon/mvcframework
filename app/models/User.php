<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (user_name, user_email, password) VALUES (:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Exécution
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email= :email');

        $this->db->bind(':email', $email);

        //Vérifie si email existe déjà
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}