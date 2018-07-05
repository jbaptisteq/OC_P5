<?php
session_start();
require('../controller/controller.php');

// Security Connection Form
if (isset($_POST['blueIce'])) {
    if (empty($_SESSION['blueIce'])) {
        $_SESSION['errorMessage'] = 'Erreur de session, veuillez vous reconnecter.';
        header('Location: connexion.php');
        exit;
    }
    if ($_SESSION['blueIce'] !== $_POST['blueIce']) {
        $_SESSION['errorMessage'] = 'Erreur de session, veuillez vous reconnecter.';
        header('Location: connexion.php');
        exit;
    }
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['errorMessage'] = 'Vous n\'avez pas remplis tout les champs';
        header('Location: connexion.php');
        exit;
    }
    $_SESSION['usernameTest'] = $_POST['username'];
    $_SESSION['passwordTest'] = $_POST['password'];
    header('Location: adminPanel.php');
} else {
    $_SESSION['errorMessage'] = 'Erreur de session, veuillez vous reconnecter.';
    header('Location: connexion.php');
    exit;
}
