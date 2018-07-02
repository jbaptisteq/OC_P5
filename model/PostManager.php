<?php
namespace P5jbq\Blog\Model;
// Call for DB Connexion
require_once("../model/Manager.php");

/**
* Post Manager
* Manage Summaries, list, author, show, display Comments, new article, new comment and update article
 */
class PostManager extends Manager
{
    public function getLastSummaries($nb = 3)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, post_date, content FROM post ORDER BY post_date DESC LIMIT 0, '.$nb);
        $summaries = $req->fetchAll();

        return $summaries;
    }

    public function showArticle($idArticle)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, user_id, title, content, edit_author, DATE_FORMAT(post_date, '%d-%m-%Y à %Hh%i') AS post_date, DATE_FORMAT(edit_date, '%d-%m-%Y à %Hh%i') AS edit_date FROM post WHERE id = ?");
        $req->execute(array($idArticle));
        $article = $req->fetch();

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
        $req = $db->query("SELECT post.id, post.user_id, post.title, post.content, post.edit_author, DATE_FORMAT(post.edit_date, '%d-%m-%Y à %Hh%i') AS edit_date, DATE_FORMAT(post.post_date, '%d-%m-%Y à %Hh%i') AS post_date, user.username FROM post, user WHERE post.user_id = user.id ORDER BY post.post_date DESC");
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
        $req = $db->prepare('INSERT INTO comment (post_id, author, content, comment_date, authorized) VALUES(?, ?, ?, NOW(), 0)');
        $newComment = $req->execute(array($idArticle, $authorComment, $content));

        return $newComment;
    }

    public function postArticle($userId, $articleTitle, $articleContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post (user_id, title, content, post_date) VALUES (?, ?, ?, NOW())');
        $newArticle = $req->execute(array($userId, $articleTitle, $articleContent));

        return $newArticle;
    }

    public function updateArticle($updateTitle, $updateContent, $updateAuthor, $idArticle)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET title = :title, content = :content, edit_author = :edit_author, edit_date = NOW() WHERE id = :id');
        $req->execute([
                "title" => $updateTitle,
                "content" => $updateContent,
                "edit_author" => $updateAuthor,
                "id" => $idArticle
        ]);
    }

    public function deleteArticle($idArticle)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($idArticle));
    }
}
