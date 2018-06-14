<?php
session_start();
require('../controller/controller.php');
$articles = listArticles();
include("../view/blogHeader.php");
$title = "Blog";

?>

<!--
Début du bloc spécifique à cette view. Tout le reste est générique et doit être factorisé par la suite
-->
<?php
foreach ($articles AS $article) :
    // $author = getAuthor($article['id']);
    $shortContent = substr($article['content'], 0, 300);
    $id = $article['id'];
    ?>
    <!-- Blog Section -->
    <section class="success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><?= isset($article['title'])? htmlspecialchars($article['title']) :'title' ?></h1>
                </div>
                <p class="text-center">le <?= isset($article['post_date'])? $article['post_date']: '' ?> par <?= isset($article['username'])? $article['username'] : '' ?></p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><?= isset($article['content'])? nl2br($shortContent).'...'.'<a href="article.php?id='.$article['id'].'">Lire en entier</a>' : 'void' ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>
<!--
Fin du bloc spécifique
-->
<?php
include("../view/footer.php");
?>
