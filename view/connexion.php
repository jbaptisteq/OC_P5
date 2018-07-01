<?php
session_start();
require('../controller/controller.php');
$title = "Connexion à l'administration";
include("../view/header.php");

if (!empty($_SESSION['username'])){
    echo "</br></br></br></br></br></br>Vous êtes déjà connecté</br> <a href=\"adminPanel.php\">Retourner à l'administration</a>";
    exit;
}
$_SESSION['blueIce'] = bin2hex(random_bytes(32));
?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Connexion</h1>
                <form action="connectCheck.php" method="post">
                    <?php
                    if (isset($_SESSION['errorMessage'])) {
                        echo $_SESSION['errorMessage'];
                        unset($_SESSION['errorMessage']);
                    }
                    if (isset($_SESSION['userMessage'])) {
                        echo $_SESSION['userMessage'];
                        unset($_SESSION['userMessage']);
                    }
                    ?>
                    <p>Pseudo : <br /><input type="text" name="username" id="username" /></p>
                    <p>Mot de passe: <br /><input type="password" name="password" id="password"/></p>
                    <input type="submit" value="Connexion" id="button"/>
                    <input type="hidden" name="blueIce" id="blueIce" value="<?php echo $_SESSION['blueIce']; ?>" />
                    <p><a href="register.php">S'enregistrer</a></p>
                </form>
            </div>
        </div>
    </div>
</section>

<!--
Fin du bloc spécifique
-->
<?php
include("../view/footer.php");
?>
