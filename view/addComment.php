<?php
session_start();
require('../controller/controller.php');
// Cas d'une validation de formulaire pour création de commentaire
if (isset($_POST['blackIce'])) {
    if (empty($_SESSION['blackIce'])) {
        echo "Test Variable BlackIce non existantes ou vide.";
        print_r($_SESSION);
        echo $_SESSION['blackIce'];
        exit;
    }
    if ($_SESSION['blackIce'] !== $_POST['blackIce']) {
        echo "Les variables blackIce sont différentes.";
        print_r($_SESSION);
        echo $_SESSION['blackIce'];
        exit;
    }
    if (empty($_POST['authorComment']) || empty($_POST['content'])) {
        echo "Vous n'avez pas remplis tout les champs.";
        exit;
    }
    newComment($_GET['id'], $_POST['authorComment'], $_POST['content']);
    header('Location: article.php?id='.$_GET['id']);

} else {
    echo "erreur";
}
