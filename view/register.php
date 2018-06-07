<?php
require('../controller/controller.php');
$title = "S'enregistrer sur le Blog";
include("../view/header.php");
?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Enregistrement</h1>
                <p>
                    <form action="register.php" method="post">
                        <p>Pseudo : <br /><input type="text" name="username" id="username" /></p>
                        <p>Mot de passe: <br /><input type="password" name="password" id="password"/></p>
                        <p>Confirmation du Mot de passe :<br /><input type="password" name="password_check" id="password_check"/></p>
                        <p>Adresse Mail : <br /><input type="text" name="email"  id="email_user" /></p>
                        <input type="submit" name="submit" value="S'enregistrer" id="button"/>
                        <p><a href="connexion.php" class="return_index">Retour</a></p>
                    </form>
                </p>
            </div>
        </div>
    </div>
</section>
<?php

// Check new User Form
if (isset($_POST['submit']))
{
    // Checking no empty information
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_check']) || empty($_POST['email']))
    {
        echo "<p class=\"Alerte\">Vous devez remplir tout les champs.</p>";
        return;
    }

    // checking username disponibility
    //

    $username = htmlspecialchars($_POST['username']);

    $username_exist = checkUsername($username);
    if ($username_exist)
    {
        echo "<p class=\"Alerte\">Cet identifiant est déjà utilisé.</p>";
        return;
    }

    // checking passwords are the same
    if ($_POST['password'] !== $_POST['password_check'])
    {
        echo "<p class=\"Alerte\">Vous avez entré des mots de passe différents.</p>";
        return;
    }

    // password Hash
    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST['email']);
    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
    {
        echo "<p class=\"Alerte\">Vous avez entré une adresse email éronnée.</p>";
        return;
    }

    newUser($username, $pass_hash, $email);
}?>

<!--
Fin du bloc spécifique
-->
<?php
include("../view/footer.php");
?>
