<?php

namespace P5jbq\Blog\Model;

require_once("model/Manager.php"); // Call for DB Connexion

class UserManager extends Manager
{
    public function newUser( $username, $password, $email, $validated = false)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO User (username, password, email, validated) VALUES (?, ?, ?, ?)');
        $req->execute(array($username, $password, $email, $validated));
    }

}
