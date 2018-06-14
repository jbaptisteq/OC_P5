<?php
session_start();
require('../controller/controller.php');
$title = "Connexion à l'administration";
include("../view/header.php");
$articles = listArticles();
$listComments = listComments();

if (!isset($_SESSION['user_id'])) {
    //check Connexion form
    $username = htmlspecialchars($_POST['username']);
    $loginInfo = loginInfo($username);
    if (!$loginInfo) {
        $_SESSION['errorMessage'] = 'Mauvais identifiant ou mot de passe !';
        header('Location: connexion.php');
        exit;
    }

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['password'], $loginInfo['password']);
    if (!$isPasswordCorrect) {
        $_SESSION['errorMessage'] = 'Mauvais identifiant ou mot de passe !';
        header('Location: connexion.php');
        exit;
    }

    if ($loginInfo['validated'] != 1) {
        $_SESSION['errorMessage'] = 'Vous n\'avez pas les droits suffisants pour accéder à la modération de commentaires';
        header('Location: connexion.php');
        exit;
    }

    $_SESSION['user_id'] = $loginInfo['id'];
    $_SESSION['username'] = $username;
    $_SESSION['validated'] = $loginInfo['validated'];
}

?>

<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Espace Administration</h1>
                <form action="logout.php" method="post" class="connect_zone">
                    <input type="submit" value="Déconnexion" name= "deconnect" id="button"/>
                </form>
            </div>
            <div class="col-lg-6 text-center">
                <h3>Editer un article</h3>
                <?php foreach ($articles AS $article) : ?>
                    <p><?= isset($article['title'])? htmlspecialchars($article['title']) :'title' ?> par <?= isset($article['username'])? $article['username'] : '' ?> <?= $_SESSION['validated'] == 1 ? '<a href="editArticle.php?id='.htmlspecialchars($article['id']).'">Editer</a>' : '' ?></p>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 text-center">
                <h3>Valider un Commentaire</h3>
                <?php if (isset($_SESSION['commentMessage'])): ?>
                    <span style="color: lightblue"><?= $_SESSION['commentMessage'] ?></span>
                <?php
                    unset($_SESSION['commentMessage']);
                    endif;
                ?>
                <?php foreach ($listComments AS $comment) : ?>
                    <p><?= isset($comment['id'])? 'commentaire n°'.$comment['id'] : '' ?> par <?= isset($comment['author'])? $comment['author'] : '' ?> <?= $_SESSION['validated'] == 1 ? '<a data-toggle="modal" data-target="#Modal" data-content="'.$comment['content'].'">Vérifier</a>' : '' ?></p>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Commentaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <?= $_SESSION['validated'] == 1 ? '<a href="authorizedComment.php?id='.$comment['id'].'">Valider</a>' : '' ?>
                                    <?= $_SESSION['validated'] == 1 ? '<a href="deleteComment.php?id='.$comment['id'].'">Effacer</a>' : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
<script>
$('#Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('content')
    var modal = $(this)
    modal.find('.modal-body').text(recipient)
})
</script>
