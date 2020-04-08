<?php $title = 'Bienvenue a kaenix'; ?>

<?php //  debut d'entete de l'accueil     ?>

 <?php ob_start(); ?>
     <!-- header begin -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 d-xl-flex d-lg-flex align-items-center">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center">
                                <div class="logo">
                                    <a href="index.php?action=compte"><img src="public/assets/img/91025774_243110436844688_8163869532679569408_n.jpg" height="80px" width="80px" alt="" style="border-radius: 100%;"></a>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-none d-block col-6">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="mainmenu">
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="about.html">Accueil <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Règles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Membres</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Administration</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Tournois</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header end -->
 <?php $header = ob_get_clean(); ?>
<?php // fin d'etete ?>


   <?php ob_start(); ?>
<style type="text/css">
    .inp{
        height: 70px;
        margin: 2%;
        opacity: 0.8;

    }
</style>
      
        <!-- preloader begin -->
        <div class="preloader">
            <div class="loader">
                <hr>
                <hr>
            </div>
        </div>
        <!-- preloader end -->

        <!-- banner begin -->
        <div class="banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="banner-content">
                            <h1 style="display: inline;">KAENIX</h1>
                            <h4>L'art Du Role Play &nbsp;&nbsp;</h4>
                             
                    <br />

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="add-space section-title text-center">
                            
                           <p></p>
                        </div>
                    </div>
                </div>
             
                            <form method="post" action="index.php?action=connect-user" enctype="multipart/form-data">
                                <div class="row">
                                   
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" required="ici le preenomm" placeholder="Prenom de votre personnage"  value="" class="form-control inp" name="prenom">
                                        <span></span>
                                    </div>
                             <br /><br />
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="password" required="true" placeholder="Votre mot de pass "  name="pass" id="pass" class="form-control inp">
                                        <span></span>
                                    </div>
                            <br /><br />
                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-lg">Connexion <span class="fas fa-user"></span> </button>
                                    </div>
                                </div>
                            </form>
                        
            



                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="banner-bottom">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 d-xl-block d-lg-block d-md-none">
                                    <div class="part-img">
                                        <img src="public/assets/img/1141718-1280x800-[DesktopNexus.com].jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 d-xl-flex d-lg-flex d-md-block align-items-center">
                                    <div class="promo-video">
                                        <div class="part-icon">
                                            <a class="play-button venobox mfp-iframe" href="https://www.youtube.com/watch?v=L2ncHzfts_0"><i class="fas fa-play"></i></a>
                                        </div>
                                        <div class="part-text">
                                            <h3>videos de presentation </h3>
                                            <span class="intro">Regardez une introduction</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 d-xl-flex d-lg-flex d-md-flex align-items-center">
                                    <div class="banner-buttons">
                                        <a href="index.php?action=form-inscription">inscription</a>
                                        <a href="?action=form-connexion">connexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->

        <!-- countdown begin -->
        <div class="countdown">
            <div class="container">
                <div class="row justify-content-xl-center justify-content-lg-center justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-lg-8 d-xl-flex d-lg-block align-items-center">
                        <div class="countdown-title">
                            <h2>Evenement dans</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-lg-8">
                        <div class="part-countdown">
                            <div class="timer" data-date="29 April 2019 9:56:00 GMT+01:00">
                                <div class="single-count">
                                    <span class="day"></span><span class="title">jours</span>
                                </div>
                                <div class="single-count">
                                    <span class="hour"></span><span class="title">heures</span>
                                </div>
                                <div class="single-count">
                                    <span class="minute"></span><span class="title">minutes</span>
                                </div>
                                <div class="single-count">
                                    <span class="second"></span><span class="title">secondes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- countdown end -->

        <!-- about begin -->
        <div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="about-area">
                            <div class="row no-gutters">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="part-text">
                                        <h2>Kaenix ?!</h2>
                                        <p>Un lien si fort qui réunit des personnes si différentes 

Des personnes animées par une même flamme de folie 

Un amour éternel qui est frustrant à la limite 

..........oui c'est sa Kaenix

N'oubliez jamais de garder le sourire même quand ça va mal

N'oubliez jamais l'importance de Kaenix

Rappelez vous de nos moments passés ensemble

 Le sourire qui fait de nous ce que nous sommes , les beaux moments passés ensemble 

Donnez le meilleur de vous dans tout ce que vous Entreprennez</p>
                                        <a href="#">Rejoint nous <span class="fas fa-user "></span></a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 d-xl-block d-lg-block d-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about end -->

       

        <!-- subscribe newsletter begin -->
        <div class="subscribe-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="section-title text-center">
                            <h2>Cherchez un membre</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="form">
                            <form class="newsletter-form">
                                <input class="newsletter-input" type="text" placeholder="Entre le nom de son perso">
                                <button type="submit">Trouver maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- subscribe newsletter end -->

        <!-- contact begin -->
        <!--<div class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="add-space section-title text-center">
                            <h2>Drop A Message</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="contact-form">
                            <form>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" placeholder="Enter your name">
                                        <span></span>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" placeholder="Enter your email">
                                        <span></span>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" placeholder="Enter your subject">
                                        <span></span>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <textarea placeholder="Write a message"></textarea>
                                        <span class="textarea"></span>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <button>Send Us Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- contact end -->


   <?php $content = ob_get_clean(); ?>
<?php require 'public/base.php'; ?>


