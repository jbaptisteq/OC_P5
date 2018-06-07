<?php
require('../controller/controller.php');
$title = "Connexion à l'administration";
include("../view/header.php");
?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Connexion</h1>
                <form action="adminPanel.php" method="post">
                    <?php
                    if (isset($_SESSION['errorMessage'])) {
                        echo $_SESSION['errorMessage'];
                        unset($_SESSION['errorMessage']);
                    }
                    ?>
                    <p>Pseudo : <br /><input type="text" name="username" id="username" /></p>
                    <p>Mot de passe: <br /><input type="password" name="password" id="password"/></p>
                    <input type="submit" value="Connexion" id="button"/>
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
