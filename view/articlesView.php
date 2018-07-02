<?php
session_start();
require('../controller/controller.php');
include("../view/blogHeader.php");

$articles = listArticles();
$title = "Blog";

?>


<?php
// Display all articles with short version and link for unique article
foreach ($articles as $article) :
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
                <p class="text-center"><?= isset($article['edit_date'])? 'modifié le '.$article['edit_date'].' par' : '' ?><?= isset($article['edit_author'])? $article['edit_author'] : '' ?> </p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><?= isset($article['content'])? nl2br($shortContent).'...'.'<a href="article.php?id='.$article['id'].'">Lire en entier</a>' : 'void' ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<?php
include("../view/footer.php");
?>
