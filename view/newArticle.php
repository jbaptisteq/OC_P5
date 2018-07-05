<?php
session_start();
require('../controller/controller.php');

// Security nex Article Form
if (isset($_POST['redIce'])) {
    if (empty($_SESSION['redIce'])) {
        echo "Une erreur s'est produite lors de l'envoi de votre article.";
        exit;
    }
    if ($_SESSION['redIce'] !== $_POST['redIce']) {
        echo "Une erreur s'est produite lors de l'envoi de votre article.";
        exit;
    }
    if (empty($_POST['articleTitle']) || empty($_POST['articleContent'])) {
        echo "Vous avez laissé un ou des champs vide.";
        exit;
    }
    newArticle($_SESSION['user_id'], $_POST['articleTitle'], $_POST['articleContent']);
    header('Location: articlesView.php');
} else {
    header('Location: postArticle.php');
}
