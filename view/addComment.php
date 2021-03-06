<?php
session_start();
require('../controller/controller.php');

/**
* Security for Comment Form, adding Comment
*
 */
if (isset($_POST['blackIce'])) {
    if (empty($_SESSION['blackIce'])) {
        echo "Une erreur s'est produite lors de l'envoi de votre commentaire.";
        echo '<br /><a href="article.php?id='.$_GET['id'].'">Retour à l\'article</a>';
        return;
    }
    if ($_SESSION['blackIce'] !== $_POST['blackIce']) {
        echo "Une erreur s'est produite lors de l'envoi de votre commentaire.";
        echo '<br /><a href="article.php?id='.$_GET['id'].'">Retour à l\'article</a>';
        return;
    }
    if (empty($_POST['authorComment']) || empty($_POST['content'])) {
        echo "Une erreur s'est produite lors de l'envoi de votre commentaire.";
        echo '<br /><a href="article.php?id='.$_GET['id'].'">Retour à l\'article</a>';
        return;
    }
    newComment($_GET['id'], $_POST['authorComment'], $_POST['content']);
    header('Location: article.php?id='.$_GET['id']);
} else {
    header('Location: article.php?id='.$_GET['id']);
}
