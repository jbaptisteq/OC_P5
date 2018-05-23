<?php

session_start();
// Load class
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');
require_once('../model/UserManager.php');

use P5jbq\Blog\Model as Model;

function listSummaries()
{
    $postManager = new Model\PostManager(); // Create Object
    $summaries = $postManager->getLastSummaries(); // Call summaries from Object $postManager

    require('view/listSummaries.php');
}

function listArticles()
{
    $postManager = new Model\PostManager();
    $listArticles = $postManager->listArticles();

    return $listArticles;
}

function showArticle($idArticle)
{
    error_log('Dans controller showArticle avec idArticle = '.$idArticle);
    $postManager = new Model\PostManager();
//    $commentManager = new Model\CommentManager();

    $article = $postManager->showArticle($idArticle);
//    $comments = $commentManager->getComments();
    error_log('Juste avant return controller showArticle');
    return $article;
}

function getAuthor($idArticle)
{
    // $_SESSION['debug'][] = "Dans getAuthor pour article id : $idArticle";
    $postManager = new Model\PostManager();
    $author = $postManager->getAuthor($idArticle);

    return $author;
}

function getComments($idArticle)
{
    // $_SESSION['debug'][] = "Dans getComments pour article id : $idArticle";
    $postManager = new Model\PostManager();
    $comments = $postManager->getComments($idArticle);

    // $_SESSION['error'][] = "ERROR RANDOM POUR GETCOMMENTS article id : $idArticle";
    return $comments;
}

function newComment($idArticle, $authorComment, $content)
{
    $postManager = new Model\PostManager();
    $newComment = $postManager->postComment($idArticle, $authorComment, $content);

    if ($newComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {

    }
}
