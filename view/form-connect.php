<?php $title = 'connectez-vous'; ?>
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
                                            <a class="nav-link" href="index.php?action=compte">Accueil <span class="sr-only"></span></a>
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

 <?php ob_start(); ?>
   <div class="preloader">
            <div class="loader">
                <hr>
                <hr>
            </div>
        </div>

 <div class="banner">
     <div class="container">
<br /><br /><br /><br /><br /><br />
              <div class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="add-space section-title text-center">
                            <h2>Connexion rapide  </h2>
                            <p> le site se souviendra automatiquement de vous  </p>

                           <p><?= $er; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="contact-form">
                            <form method="post" action="index.php?action=connect-user" enctype="multipart/form-data">
                                <div class="row">
                                   
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" required="ici le preenomm" placeholder="Prenom de votre perso (comme defini lors de l'inscription)" value="<?= $_SESSION['err_nom']; ?>" name="prenom">
                                        <span></span>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <input type="password" required="true" placeholder="Votre mot de pass (comme defini lors de l'inscription)" name="pass" id="pass">
                                        <span></span>
                                    </div>
                                   
                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit">Connexion </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            -</div>
        </div>
     </div>
     <br /><br />
 </div>

 <?php $content = ob_get_clean(); ?>
<?php require 'public/base.php'; ?>
