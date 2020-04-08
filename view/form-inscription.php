<?php $title = 'Inscrivez-vous'; ?>
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
                                            <a class="nav-link" href="about.html">Accueil <span class="sr-only"></span></a>
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
                            <h2>Venez Voir Les Bakas  </h2>
                            <p> Dans ce formulaire vous devez- donner des infos sur votre perso et n'oublier pas de donner le nom irl de l'utilisateur du perso (votre nom). cela va permettre de marquer le perso de son utilisateur <br />
                             <i style="color:orange; font-size: 0.7em;"><b>REMARQUE: Au niveau ou il est demander de choisir un fichier,il s'agit de choisir une photo</b></i>
                             </p>

                           <p> <?= $erreur; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="contact-form">
                            <form method="post" action="index.php?action=save-user" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" autofocus="true" required="true" placeholder="Nom du perso" name="nom" id="nom">
                                        <span></span>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" required="true" placeholder="Prenom du perso" name="prenom" id="prenom">
                                        <span></span>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" required="true" placeholder="Nom IRL complet de l'utilisateur du perso (votre nom)" name="nom_utilisateur">
                                        <span></span>
                                    </div>
                                    <div class="col-xl-12 col-lg-12" style="margin-bottom: 5%; padding: 2%;">
                                        
                                        <select name="sexe" class="form-control">
                                            <option value="indef" disabled="true">sexe</option>
                                            <option value="f">Femme</option>
                                            <option value="h">Homme</option>
                                        </select>
                                        <span></span>
                                    </div><br /><br /><br />

                                    <div class="col-xl-6 col-lg-6">
                                        <input type="password" required="true" placeholder="Cree un mot de pass" name="pass" id="pass">
                                        <span></span>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <input type="password" required="true" placeholder="Confirmer le mot de pass" name="pass2" id="pass2">
                                        <span></span>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <input type="file" required="true" class="form-control" placeholder="Confirmer le mot de pass" name="pdp" id="pdp">
                                        <span></span>
                                    </div>
                                    
                                   
                                    <div class="col-xl-12 col-lg-12">
                                        <textarea placeholder="Decriver votre perso en quelque ligne" required="true" name="description_perso"></textarea>
                                        <span class="textarea"></span>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <button type="submit">Enregistrement </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
     </div>
     <br /><br />
 </div>

 <?php $content = ob_get_clean(); ?>
<?php require 'public/base.php'; ?>
