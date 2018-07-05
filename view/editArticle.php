<?php
session_start();
require('../controller/controller.php');

$article = showArticle($_GET['id']);
$author = getAuthor($_GET['id']);

$title = "Edition de l'Article";
include("../view/blogHeader.php");
$_SESSION['whiteIce'] = bin2hex(random_bytes(32));
?>

<!--
Début du bloc spécifique à cette view. Tout le reste est générique et doit être factorisé par la suite
-->

<!-- Blog Section -->
<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?= isset($_SESSION['username'])? ('<p>Vous êtes identifier en tant que <strong>'.$_SESSION['username'].'</strong></p>') : '' ?>
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
                <form method="post" class="text-center form-group" action="modifArticle.php?id=<?= $_GET['id'] ?>" method="post">
                    <p style="color: green"><?= isset($_SESSION['updateMessage'])? $_SESSION['updateMessage'] : "" ?></p>
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
                        <input type="hidden" name="whiteIce" id="whiteIce" value="<?php echo $_SESSION['whiteIce']; ?>" />
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
