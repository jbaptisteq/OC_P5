<?php

namespace P5jbq\Blog\Model;

require_once("model/Manager.php"); // Call for DB Connexion

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") FROM comment WHERE post_id = ? AND autorized = TRUE ORDER BY comment_date DESC');
        $req->execute(array($postId));
        $comments = $req->fetchAll();

        return $comments;
    }

    public function postComment($postId, $author, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comment(post_id, author, content, comment_date) VALUES(?, ?, ?, NOW())');
        $req->execute(array($postId, $author, $comment));

        return $this->getComments($postId);
    }

    public function autorizedComment($commentId)
    {
        $db = $this->dbConnect();
        $db->query('UPDATE comment SET autorized = TRUE WHERE comment_id = '.$commentId);
    }

}
