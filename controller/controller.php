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
}

function newArticle($userId, $articleTitle, $articleContent)
{
    $postManager = new Model\PostManager();
    $newArticle = $postManager->postArticle($userId, $articleTitle, $articleContent);

    if($newArticle === false){
        throw new Exception ("Impossible d'ajouter l'article !");
    }
}

function checkUsername($username)
{
    $manager = new Model\UserManager();
    $username_exist = $manager->checkUsername($username);

    return $username_exist;
}

function newUser($username, $password, $email)
{
    $userManager = new Model\UserManager();
    $newUser = $userManager->newUser($username, $password, $email);

    if ($newUser === false) {
        throw new Exception ("Impossible d'ajouter l'utilisateur !");
    }
}

function loginInfo($username)
{
    $userManager = new Model\UserManager();
    $loginInfo = $userManager->loginInfo($username);

    return $loginInfo;
}

function getPassHash($username)
{
    $userManager = new Model\UserManager();
    $getPassHash = $userManager->getPassHash($username);

    return $getPassHash;
}

function updateArticle($updateTitle, $updateContent, $idArticle)
{
    $postManager = new Model\PostManager();
    $updateArticle = $postManager->updateArticle($updateTitle, $updateContent, $idArticle);

    if ($updateArticle === false) {
        throw new Exception ("Impossible d'éditer l'article !");
    }
}
