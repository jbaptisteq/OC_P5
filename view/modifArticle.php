<?php
session_start();
require('../controller/controller.php');

// Security Edit Article Form
if (isset($_POST['whiteIce'])) {
    if (empty($_SESSION['whiteIce'])) {
        echo "Test Variable whiteIce non existantes ou vide.";
        print_r($_SESSION);
        echo $_SESSION['whiteIce'];
        exit;
    }
    if ($_SESSION['whiteIce'] !== $_POST['whiteIce']) {
        echo "Les variables whiteIce sont différentes.";
        print_r($_SESSION);
        echo $_SESSION['whiteIce'];
        exit;
    }
    if (empty($_POST['articleTitle']) || empty($_POST['articleContent'])) {
        echo "Vous avez laissé un ou des champs vide.";
        exit;
    }
    updateArticle($_POST['articleTitle'], $_POST['articleContent'], $_GET['id']);
    $_SESSION['updateMessage'] = "L'article numéro ".$_GET['id']." a bien été mis à jour.";
    header('Location: editArticle.php?id='.$_GET['id']);

} else {
    header('Location: editArticle.php?id='.$_GET['id']);
}
