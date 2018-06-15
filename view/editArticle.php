<?php
session_start();
require('../controller/controller.php');

$updateMessage = "";
if (!empty($_POST['articleTitle']) && !empty($_POST['articleContent'])) {
    updateArticle($_POST['articleTitle'], $_POST['articleContent'], $_GET['id']);
    $updateMessage = "L'article numéro ".$_GET['id']." a bien été mis à jour";
}

$article = showArticle($_GET['id']);
$author = getAuthor($_GET['id']);

$title = "Edition de l'Article";
include("../view/blogHeader.php");
?>

<!--
Début du bloc spécifique à cette view. Tout le reste est générique et doit être factorisé par la suite
-->

<!-- Blog Section -->
<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1><?= isset($article['title'])? htmlspecialchars($article['title']) :'titre' ?></h1>
                <p class="text-center">le <?= isset($article['post_date'])? $article['post_date']: '' ?> par <?= isset($author['username'])? $author['username'] : 'inconnu' ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="row"></br></br>
            <div class="col-lq-12 comments">
                <form method="post" class="text-center form-group" action="editArticle.php?id=<?= $_GET['id'] ?>" method="post">
                    <p style="color: green"><?= $updateMessage ?></p>
                    <div>
                        <label for="title">Titre</label><br />
                        <input type="text" id="updateTitle" name="articleTitle" size="50" value="<?= isset($article['title'])? htmlspecialchars($article['title']) :'titre' ?>" />
                    </div></br>
                    <div>
                        <label for="content">Contenu</label><br />
                        <textarea id="articleContent" class="form-control" name="articleContent" rows="10"><?= isset($article['content'])? nl2br(htmlentities($article['content'])) : 'void' ?></textarea>
                    </div></br>
                    <div>
                        <input type="submit" />
                    </div>
                </form>
                <p><a href="adminPanel.php" class="return_index">Retour à l'administration</a></p>
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
