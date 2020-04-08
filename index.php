<?php 
//try{
  session_start();
  require_once 'controller/controller.php';
if (isset($_GET['action'])) {

  $action = htmlspecialchars($_GET['action']);
  if ($action == 'form-inscription') {
       $erreur = '';
       if (isset($_GET['errUserTeck'])) {
       	 $erreur ='<i style="background: red; padding: 1%; display:block; color: white;">Desoler le perso que vous voulez utiliser est deja pris. veillez choisir un personnage disponible.<br /> <a href="" class="btn btn-danger">voir la liste des personnages pris</a></i>';
       }
       require 'view/form-inscription.php';
  }


  if ($action == 'form-connexion') {
  	$er ='';
    if (!isset($_SESSION['err_nom'])) {
        $_SESSION['err_nom'] = '';
    }
  	 if (isset($_GET['errAuth'])) {
  	 	$er = '<i style="background: red; padding: 1%; display:block; color: white;">Erreur d\'authentification pour le personnage <b>' .$_SESSION['err_nom'] .' </b>. impossible de trouver le compte.<br /> le mot de pass ne correspond pas</i>';
  	  }

      require 'view/form-connect.php';
  	   
  }

  if ($action == 'connect-user') {

  	   connectUser();
  }

  if ($action == 'save-user') {
  	  
  	 save();

  }

  if ($action == 'compte') {
  	  compte();
  }

  if ($action == 'req') {
  	requete();
    
  }

/** route pour l'utilisateur root **/
  if ($action == 'root') {
    $erreur ='';
    if (isset($_GET['err'])) {
      $erreur = '<i style="color:red;">connexion refuser pour le root</i><br />';
    }
    require 'view/root/root.php';
  }

  if ($action == 'rootControl') {

    rootControl();
  }

  if ($action == 'rootAccess') {
    
    rootAccess();
  }
  if ($action == 'rootUsers') {
    rootUsers();
  }
  if ($action== 'rootRequest') {
    rootRequest();
  }
  if ($action== 'rootRequestSubmit') {
    rootRequestSubmit();
  }
/** fin de l'utilisateur root **/

  if ($action == 'prelogout') {
    require 'view/mailSave.php';
  }
   
   if ($action == 'logout') {
      logout();
   }

/**  publication  **/

  if ($action == 'publication') {
    publication();
    
  }
  
  if ($action == 'test') {
    publications();
    while ($d = $pubs -> fetch()) {
      echo $d['nom'];
    }
    echo 'oui';
  }

/** fin publication **/












 }else{

  // si ses sessions sont encore actif
 	if (isset($_SESSION['id'])) {
 		header('location:?action=compte');
 	}
  //si il n'a plus de sessions et que il a un cookie actif
  if (isset($_GET['logout'])) {
    
  }
 	    if(isset($_COOKIE['prenom'])){
         cooki();
       }

  	require 'view/home.php';
  }

/*}catch(Exeption $e){ //si il ya eu une erreur
   echo 'erreur :' . $e -> getMessage();
}*/