<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listSummaries()
{
    $postManager = new \model\PostManager(); // Create Object
    $summaries = $postManager->getLastSummaries(); // Call summaries from Object $postManager

    require('view/listSummaries.php');
}

function listArticles()
{
    $postManager = new \Model\PostManager();

    $listArticles = $postManager->showArticle();

    require('view/listArticles.php');
}

function article()
{
    $postManager = new \Model\PostManager();
    $commentManager = new \Model\CommentManager();

    $article = $postManager->showArticle($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/article.php');
}
