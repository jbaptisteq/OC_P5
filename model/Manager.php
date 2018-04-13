<?php

namespace P5jbq\Blog\Model;// Namspace

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=P5jbq;charset=utf8', 'root', '');
        return $db;
    }

    /**
    * SELECT all rows from tableName and return them in array
    */
    public function selectAllFrom($tableName, $where = 1)
    {
        $db = $this->dbConnect();
        $result = $db->query("SELECT * FROM $tableName WHERE $where")->fetchAll();

        return $result;
    }
}
