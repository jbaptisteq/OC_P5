<?php
require('../controller/controller.php');

error_log('$_GET id recup : '.$_GET['id']);
$article = showArticle($_GET['id']);
$author = getAuthor($_GET['id']);
error_log('Article recup');
$comments = getComments($_GET['id']);
error_log('Commentaires recup');

// TODO : Retrieve comments for reauested Article : comment.post_id = $article['id']

/* Echelle :
Vue article.php
$comments = getComments($article['id'])
Controller.php
PostManager->getComments($idArticle)
-> return array comments
PostManager.php
function getComments($idArticle)
-> return array comments
*/

$title = "Lecture de l'article";
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
            </div>
            <p class="text-center">le <?= isset($article['post_date'])? $article['post_date']: '' ?> par <?= isset($author['username'])? $author['username'] : 'inconnu' ?></p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p><?= isset($article['content'])? nl2br(htmlspecialchars($article['content'])) : 'void' ?></p>
            </div>
        </div>
        <div class="row"></br></br>
            <div class="col-lg-12 text-center comments"><h3>Commentaires</h2>
                <?php
                foreach ($comments AS $comment) :
                    if ($comment['authorized'] == 1)
                    {?>
                        <p class="col-md-12">le <?=isset($comment['comment_date'])? $comment['comment_date']: 'inconnu'?> par <?= isset($comment['author'])? $comment['author']: 'inconnu'?></p>
                        <p class="col-md-12"><?= isset($comment['content'])? nl2br(htmlspecialchars($comment['content'])) : 'Aucun contenu'?></p>
                    <?php }
                endforeach; ?>
            </div>
            <div class="col-lq-12 comments">
                <form method="post" class="text-center form-group" action="article.php?action=addComment&amp;id=<?= $article['id'] ?>" method="post">
                    <div>
                        <label for="author">Auteur</label><br />
                        <input type="text" id="authorComment" name="authorComment" />
                    </div>
                    <div>
                        <label for="content">Commentaire</label><br />
                        <textarea id="content" class="form-control" name="content" rows="10"></textarea>
                    </div></br>
                    <div>
                        <input type="submit" />
                    </div>
                    <?php
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['authorComment']) && !empty($_POST['content']))
                            {
                                newComment($_GET['id'], $_POST['authorComment'], $_POST['content']);
                            }                            
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                    ?>
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