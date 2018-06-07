<?php
session_start();
require('../controller/controller.php');

$title = "Nouvel Article";
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
                <h1>Nouvel Article</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="row"></br></br>
            <div class="col-lq-12 comments">
                <form method="post" class="text-center form-group" action="postArticle.php" method="post">
                    <div>
                        <label for="title">Titre</label><br />
                        <input type="text" id="articleTitle" name="articleTitle" size="50" />
                    </div></br>
                    <div>
                        <label for="content">Contenu</label><br />
                        <textarea id="articleContent" class="form-control" name="articleContent" rows="10"></textarea>
                    </div></br>
                    <div>
                        <input type="submit" />
                    </div>
                    <?php
                        if (!empty($_POST['articleTitle']) && !empty($_POST['articleContent']))
                        {
                            newArticle(1, $_POST['articleTitle'], $_POST['articleContent']);
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
