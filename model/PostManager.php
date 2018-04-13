<?php

namespace P5jbq\Blog\Model;

require_once("model/Manager.php"); // Call for DB Connexion

class PostManager extends Manager
{
    public function getLastSummaries($nb = 5)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, summary, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") FROM post ORDER BY post_date DESC LIMIT 0, '.$nb);

        return $req->fetchAll();
    }

    public function showArticle($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postArticle($userId, $title, $content, $summary)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post (user_id, title, content, summary, post_date) VALUES (?, ?, ?, ?, NOW())');
        $req->execute(array($userId, $title, $content, $summary));
    }

    public function editArticle($postId, $newContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET content = ?, edit_date = NOW() WHERE id = ?');
        $req->execute(array($newContent, $postId));

        return $this->showArticle($postId);
    }
}
