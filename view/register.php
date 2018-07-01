<?php
session_start();
require('../controller/controller.php');
$title = "S'enregistrer sur le Blog";
include("../view/header.php");
$_SESSION['purpleIce'] = bin2hex(random_bytes(32));
?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Enregistrement</h1>
                <p>
                    <form action="newUser.php" method="post">
                        <p>Pseudo : <br /><input type="text" name="username" id="username" /></p>
                        <p>Mot de passe: <br /><input type="password" name="password" id="password"/></p>
                        <p>Confirmation du Mot de passe :<br /><input type="password" name="password_check" id="password_check"/></p>
                        <p>Adresse Mail : <br /><input type="text" name="email"  id="email_user" /></p>
                        <input type="submit" name="submit" value="S'enregistrer" id="button"/>
                        <input type="hidden" name="purpleIce" id="purpleIce" value="<?php echo $_SESSION['purpleIce']; ?>" />
                        <p><a href="connexion.php" class="return_index">Retour</a></p>
                    </form>
                </p>
            </div>
        </div>
    </div>
</section>
<?php
include("../view/footer.php");
?>
