<?php
require('../controller/controller.php');
$title = "Jean-Baptiste Queralt - Developpeur PHP";
include("../view/header.php");
$summaries = listSummaries();
?>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Développeur PHP Symfony</span>
                    <hr class="star-primary">
                    <span class="skills">Web Developer - accrocheche</span>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Blog Section -->
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Blog</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($summaries AS $summarie) :
                $shortContent = substr($summarie['content'], 0, 150);
                $id = $summarie['id'];
                ?>
                <div class="col-lg-4">
                    <div class="col-lg-12 text-center">
                        <h3><?= isset($summarie['title'])? htmlspecialchars($summarie['title']) :'title' ?></h3>
                    </div>
                    <div class="col-lg-12">
                        <p><?= isset($summarie['content'])? nl2br($shortContent).'...'.'<a href="article.php?id='.$summarie['id'].'">Lire en entier</a>' : 'void' ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Adresse Email" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include("../view/footer.php");
?>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>
