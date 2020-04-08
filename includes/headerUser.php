<?php 
 while ($don = $data -> fetch()) {
 ?>
  
     <!-- header begin -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 d-xl-flex d-lg-flex align-items-center">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center">
                                <div class="logo">
                                    <a href="index-2.html"><img src="public/assets/img/91025774_243110436844688_8163869532679569408_n.jpg" height="80px" width="80px" alt="" style="border-radius: 100%;"></a>
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
                                            <a class="nav-link" href="#">
                                               <img src="public/images/pdp/<?= $don['pdp']; ?>" height="50px" width="50px" style="border-radius: 100%;" title="<?= $don['nom']; ?>" >
                                             <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?action=compte"><span class="fas fa-home"></span> Accueil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><span class="fas fa-globe"></span> Notifications <span class="badge" style="background: red;">1</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><span class="fas fa-envelope"></span> Messages <span class="badge" style="background: red;">5</span></a></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><span class="fas fa-users"></span> Tournois <span class="badge" style="background: red;">15</span></a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="?action=prelogout"><span class="fas fa-rack"></span> Re <span class="fa fa-log-out"></span></a>
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

  
   
 <?php
     }    
 ?>