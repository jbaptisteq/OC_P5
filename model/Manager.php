<?php

namespace P5jbq\Blog\Model;

// Manager for connect to database
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=p5jbq;charset=utf8', 'root', '');
        return $db;
    }
}
