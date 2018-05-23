<?php

namespace P5jbq\Blog\Model;

require_once("../model/Manager.php"); // Call for DB Connexion

// require_once(PROJECT_BASE_DIRECTORY_PATH.'/model/Manager.php');
// Indices : __DIR__ ou $_SERVER['DOCUMENT_ROOT']
// foreach ($_SERVER AS $key => $value) {
//      echo $key, ' => ', $value, '<br>';
// }

class PostManager extends Manager
{
    public function getLastSummaries($nb = 5)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, summary, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") FROM post ORDER BY post_date DESC LIMIT 0, '.$nb);

        return $req->fetchAll();
    }

    public function showArticle($idArticle)
    {
        error_log('Dans post manager showArticle avec idArticle = '.$idArticle);
        // TODO : Retrieve author for requested article
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, user_id, title, content, DATE_FORMAT(post_date, '%d-%m-%Y à %Hh%i') AS post_date FROM post WHERE id = ?");
        $req->execute(array($idArticle));
        $article = $req->fetch();
        error_log('Juste avant return post manager showArticle');
        return $article;
    }

    public function getAuthor($idArticle)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT post.user_id, post.id, user.username FROM post RIGHT JOIN user ON post.user_id = user.id WHERE post.id = ?");
        $req->execute(array($idArticle));
        $author = $req->fetch();

        return $author;
    }

    public function listArticles()
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT post.id, post.user_id, post.title, post.content, DATE_FORMAT(post.post_date, '%d-%m-%Y à %Hh%i') AS post_date, user.username FROM post, user WHERE post.user_id = user.id ORDER BY post_date DESC");
        $req->execute();
        $articles = $req->fetchAll();

        return $articles;
    }

    public function getComments($idArticle)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT post_id, author, content, DATE_FORMAT(comment_date, '%d-%m-%Y à %Hh%i') AS comment_date, authorized FROM comment WHERE post_id = ? ORDER BY comment_date ASC");
        $req->execute(array($idArticle));
        $comments = $req->fetchAll();

        return $comments;
    }

    public function postComment($idArticle, $authorComment, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comment(post_id, author, content, comment_date, authorized) VALUES(?, ?, ?, NOW(), 0)');
        $newComment = $req->execute(array($idArticle, $authorComment, $content));

        return $newComment;
    }

    public function postArticle($userId, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post (user_id, title, content, post_date) VALUES (?, ?, ?, NOW())');
        $req->execute(array($userId, $title, $content));
    }

    public function editArticle($postId, $newContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET content = ?, edit_date = NOW() WHERE id = ?');
        $req->execute(array($newContent, $postId));

        return $this->showArticle($postId);
    }
}
