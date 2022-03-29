<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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