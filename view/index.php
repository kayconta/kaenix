<?php 

try{ 


 if (isset($_GET['action'])) {
 
 	$action = htmlspecialchars($_GET['action']);


 /*
 Nous allons ici gerer les route et cree une page 404 pour les routes introuvable
*/
// commencons par reunir tout les routes actifs dans un tableau
  $routes = array(
    'inscription',
    'home',
    'root-interface',
    'root-add',
    'root-user',
    'long',
    'modifier-profil',
    'root',
    'lang',
    'deconnexion-direct',
    'log',
    'error-connexion',
    'all-user',
    'favorie',
    'PMP',
    's-programmation',
    'admin',
    'req',
    'book-code',
    'update-pdp',
    'k'
  );
  $bool = false;
 //maintenant verifions si la route que l'utilisateur essaye d'acceder existe dans le tableau
  
    if (in_array($action, $routes)) {
      //si la route ne corespond pas on redirige l'utilisateur vers une page 404 pour dire que la route est inexistante

  require 'controller/controller.php';
  require 'controller/controller2.php';
 	if ($action=='inscription') {
        //verifion si ya ps erreur sur le pseudo
        $msg = '';
        $nbUser = nbuserControl();
        session_start();
        if (isset($_GET['ps'])) {
            $msg = '<b style="color:red;">Pseudo "'.$_SESSION['ps'].'" inutilisable.</b><br />
              deux utilisateurs ne peuvent pas avoir des pseudos identiques. un utilisateur a deja occuper <b>'.$_SESSION['ps'].'</b>. veillez cree un autre merci
            ';
        
 		require 'view/inscription.php';
       }else require 'view/inscription.php';
 	}

 	if ($action=='log') {
        connecti();
        save();
 	}

 	if ($action=='home') {
 		session_start();
 		if (!$_SESSION['pseudo']) {
 			header('location:index.php');
 		}
 		$re = teckBook($_SESSION['pseudo']);
    $re3 = fetchBook();
 		$re2 = fineL($_SESSION['pseudo']);
 		require 'view/home.php';
    //header('location:index.php?action=lang&tech=html');   
 	}

 //pour afficher les livres changer
 	      if ($action == 'search-book') {
 	      		   

 	      			   header('location:index.php?action=ch');
 	      			 
 	      }
//improvisation pour les variations des livres
 	      if ($action == 'ch') {

 	      	 session_start();
                
                	  $re = changeB();
 		            if (!$_SESSION['pseudo']) {
 			               header('location:index.php');
 		            }
 		            require 'view/home.php';
 		      
 	      }


 	if ($action=='admin') {
 		header('location:admin/index.php');
 	}

 	if ($action == 'error-connexion') {
        
 		 header('location:index.php?err=true');
 	}


//------------------------------------------------- section S -----------------------------------------
 	//pour la programmation
 	     if ($action == 's-programmation') {
 	     	session_start();
 		       //require 'view/s-programmation.php';
             header('location:index.php?action=home');
 	         }
    
    //pour la videos surveillance 
 	     if ($action == 's-video') {
 		        session_start();
 		        dom($_SESSION['pseudo'],'video surveillance');
 		        header('location:index.php?action=home');
 	         }
    //pour la robotique
 	     if ($action == 's-robotique') {
 	      
 		        session_start();
 		        dom($_SESSION['pseudo'],'robotique');
 		        header('location:index.php?action=home');
 	      }
//------------------------------------------------- fin section S -------------------------------------
//pour ajouter un nouveu langage
 	      if ($action == 'add-langage') {
 	      	   
 	      	  // require 'controller/controller.php';
 	      	   session_start();
 	      	   addBookAction($_SESSION['pseudo']);
 	      	   header('location:index.php?action=home');
 	      	   echo 'euh...';
 	      }

 //pour deconnecter l'utilisateur
 	      if ($action == 'deconnexion-direct') {
 	      	session_start();
 	      	  $_SESSION['pseudo'];
 	      	session_destroy();
 	      	header('location:index.php');
 	      }

//pour afficher la liste d'utilisateurs communs
 	      if ($action == 'all-user') {
 	      	session_start();
 	      	if(!$_SESSION['pseudo']){ header('location:index.php');}
 	      	$re = allUser();
 	      	require 'view/all-user.php';
 	      }
//pour traiter les id au niveau des livre favorie
 	      if ($action == 'f') {
 	      	// on verifie que le parametre existe
 	      	session_start();
 	      	if (isset($_GET['id'])) {
 	      		 $idn = (int)$_GET['id'];

                 jout($_SESSION['pseudo'],$idn); 
                 header('location:index.php?action=favories&id='.$idn);
 	      	}
 	      }

//pour ajouter les livres favories
 	      if ($action == 'favories') {
 	      	session_start();
 	      	if(!$_SESSION['pseudo']){ header('location:index.php');}
             //on verifie si l'id exixte
 	      	if (isset($_GET['id'])) {
 	      		$id = (int)$_GET['id'];
 	      		$r = favoriesAction($id);
 	      		while ($d = $r -> fetch()) {
 	      			$_SESSION['idB'] = $d['idBook'];
 	      		}
 	      	}
 	      	//
             header('location:index.php?action=favorie');
 	      }

// pour afficher les livres favories
 	      if ($action == 'favorie') {
 	      	//ici on affiche les livres favories
 	      	session_start();
 	      	if(!$_SESSION['pseudo']){ header('location:index.php');}
             $ib = repId($_SESSION['pseudo']); //on recupere 

 	      	 if(isset($_SESSION['idB'])) {
                $r = nn($_SESSION['idB']);


               require 'view/favories.php';
             }else{ require 'view/errF.php'; }
 	      }

//route pour notifier en cas ou le pseudo serait deja pris
          if ($action == 'PMP') {
            //on verifie que le parametre du liens existe pour recuperer la valeur
              if (isset($_GET['val'])) {
                  $valeur = htmlspecialchars($_GET['val']);
                  session_start(); //on demarre la session. 
            /* le but est de cree une session qui vas retenir en avance le pseudo de l'utilisateur pour pouvoir le manipuler dans la page d'erreur sans toutfois le faire passer par l'url */
                   $_SESSION['ps'] = $valeur;
            
                   header('location:index.php?action=inscription&ps=t');
              }
          }
//pour gerer les autres options de categories de livres
          if ($action == 'lang') {
            session_start();
            if(!$_SESSION['pseudo']){ header('location:index.php?action=home');}
              if (isset($_GET['tech'])) {
                  $techno = htmlspecialchars($_GET['tech']);
                  if ($techno == 'vs') {
                      $techno = 'video surveillance';
                  }
                  if ($techno == 'c-c') {
                      $techno = 'c-c++';
                  }

                  $re = book_categorie_action($techno);
                  require 'view/categorie.php';
              }
          }
//route pour modifier le profil
          if ($action == 'modifier-profil') {
            session_start();
              if(!$_SESSION['pseudo']){ header('location:index.php?action=home');}
              $inf = pdp_user_control($_SESSION['pseudo']);
              require 'view/profil.php';

          }

//route pour acceder au panel du super utilisateur de l'application
          if ($action == 'root') {
            require 'view/root.php';
          }

//route de traitement du formulaire envoyer pour authentifier le supers utilisateurs
          if ($action == 'root-add') {
            //fonction du controleur pour verifier l'autentification du root-user
             session_start();
              $bool = rootController(); // on recupere l'etat d'envoie du controller
              if ($bool != true) {
                // ici l'autentification s'est mal derouler. alors on le fait rester dans le formulaire
                header('location:index.php?action=root');
              }else{ 
                // ici on cree la session du root car il s'est bien autentifier 
                $_SESSION['root'] = 'Loic Tiffa';
                
                //maintenant que la session est cree, on redirige le root user vers son interface d'administration
                header('location:index.php?action=root-interface');

              }
          }

//route pour acceder a l'interface du root l'administrateur
          if ($action == 'root-interface') {
            //require 'controller/controller2.php';
            session_start();
            //verifions que la sessions existe ou pas. si cela n'esxiste pas, on le redirige vers l'accueil
            if (!$_SESSION['root']) {
              header('location:index.php?action=root');
            }
              $nbGarcon = nb_garcon();
              $nbFille = nb_fille();
              $nbMind = nb_admin();
              $nbBook = nb_book();
              $nbUser = nb_user();
            require 'view/root-interface.php';
          }


//route pour executer des requettes dans la base de donnees
          if ($action == 'req') {
              // require 'controller/controller2.php';
               addC();
          }


//route pour afficher les livres chercher a parti d'un code de recherche
          if ($action == 'book-code') {
          
          if (isset($_POST['search'])) {
            session_start();
              $re = b_code(htmlspecialchars($_POST['search']));
                $compt = 0; //pour compter combien on a de resultat
                while ($do = $re -> fetch()) {
                  $compt++;
                }
                require 'view/book-code.php';

              }else{
                header('location:index.php?action=home');
              }
          }
//route pour changer la photo de profile de l'utilisateur
          if ($action == 'update-pdp') {
            session_start();
             
               $op = update_photo($_SESSION['pseudo'],$_FILES['pdp']);
               if ($op == true) {
                 header('location:index.php?action=modifier-profil');
               }
            
          }

//pour otaku
          if ($action == 'k') {
            header('location:kaenix/index.php');
          }












  
  //sinon (si la route n'existe pas)
    }else { require 'view/error-404.php'; }

 //sinon (si il y'a pas d'action)
 }else{
    //verifions que la variable d'erreur de connection existe ou pas
  session_start();
  //si la session existe, on le redirige imediatement vers la page des livres
    if (isset($_SESSION['pseudo'])) {
         header('location:index.php?action=home');
      //echo 'votre pseudo existe ';
    }

  require 'controller/controller.php';
     $message = '';
     $nbLivre = nbBookControl();
    if (isset($_GET['err'])) {
        $message = '<b style="color:red;">Erreur de connexion au  compte</b><p> verifiez vos coordonnees car elles sont incorrects</p>';
        require 'template/index.php';
    }else
 	require 'template/index.php';
 }

}catch(Exeption $e){ //si il ya eu une erreur
   echo 'erreur :' . $e -> getMessage();
}