<?php
require('../controller/controller.php');
$title = "Connexion à l'administration";
include("../view/header.php");
?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Panneau d'administration</h1>
                <form action="connexion.php" method="post" class="connect_zone">
                    <input type="submit" value="Déconnexion" name= "deconnect" id="button"/>
                </form>
            </div>
        </div>
    </div>
</section>

<?php

//check Connexion form
$username = htmlspecialchars($_POST['username']);

$loginInfo = loginInfo($username);

// Comparaison du pass envoyé via le formulaire avec la base
if (!$loginInfo)
{
    $_SESSION['errorMessage'] =  'Mauvais identifiant ou mot de passe !';
    header('Location: connexion.php');
}
else
{
    $isPasswordCorrect = password_verify($_POST['password'], $loginInfo['password']);
    if ($isPasswordCorrect) {
        $_SESSION['user_id'] = $loginInfo['id'];
        $_SESSION['username'] = $username;
        echo 'Vous êtes connecté !';
        // $passhash = getPassHash($username);
    }
    else {
        $_SESSION['errorMessage'] =  'Mauvais identifiant ou mot de passe !';
        header('Location: connexion.php');
    }
}
?>

<!--
Fin du bloc spécifique
-->
<?php
include("../view/footer.php");
?>
