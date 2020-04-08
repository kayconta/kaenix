<?php
require_once 'model/DbManager.php';


 function save(){


 	$nom = htmlspecialchars($_POST['nom']);
 	$prenom = htmlspecialchars($_POST['prenom']);
 	$nomIRL = htmlspecialchars($_POST['nom_utilisateur']);
 	$pass = htmlspecialchars($_POST['pass2']);
  $sexe = htmlspecialchars($_POST['sexe']);
 	$description = htmlspecialchars($_POST['description_perso']);
      //traitemant de la photo de profil

  $nomFichier ='iconfinder_user-01_186382.png';
     $pd = $_FILES['pdp'];
     if (isset($_FILES['pdp'])){
       if ($pd['size'] <= 7000000)
                {
                     $infosfichier = pathinfo($pd['name']);
                     $extension_upload = $infosfichier['extension'];
                     $extensions_autorisees = array('jpg','gif','GIF', 'jpeg','JPG','JPEG','png','PNG');
                     $nomFichier = basename($pd['name']) ;

                     if (in_array($extension_upload,$extensions_autorisees)){
                           
                     	      move_uploaded_file($pd['tmp_name'], 'public/images/pdp/' . basename($pd['name']));
                     	     
                          } else throw new Exception("Mauvaise extension du fichier");
                          
                          
                }
               }
                
                

       //enregistrement 
 	  $saving = new DbManager(); //on recupere l'enregistrement

 	  $userExist = $saving -> teckUser($nom); //on fait une requette pour recuperer les utilisateurs qui utilisent deja le perso qu'on essaye d'enregistrer

 	  $compt = 0;
 	  while ($don = $userExist -> fetch()) {
 	  		$compt ++;
 	  }
      
      if ($compt == 0) {
      	// si y'a encore aucun utilisateur, on enregistre
      	$result = $saving -> saveUsers($nom,$prenom,$nomIRL,$pass,$nomFichier,$description,$sexe);
      	  if ($result == true) {
 //maintenant que l'enregistrement s'est bien effectuer, on cree les sessions de l'utilisateur
        

        $dataUser = $saving -> teckUser($nom);

        while ($do2 = $dataUser -> fetch()) {
        
          $_SESSION['id'] = $do2['id'];
          $_SESSION['nom'] = $do2['nom'];
          $_SESSION['prenom'] = $don2['prenom'];
          $_SESSION['pdp'] = $don2['pdp'];
          $_SESSION['utilisateur'] = $don2['utilisateur'];
          $_SESSION['roles'] = $don2['roles'];
          $_SESSION['sexe'] = $don2['sexe'];
        }

        //creons le cookie de l'utilisateur pour lui connecter automatiquement la prochaine fois

        setcookie('prenom', $prenom, time() + 365*24*3600, null,null, false, true);
       

 	  	header('location:?action=compte&new');
 	  } 
    }else{ 
       header('location:index.php?action=form-inscription&errUserTeck');
     }
    
 }


 function connectUser(){

 	if (isset($_POST['prenom']) && isset($_POST['pass'])) {
 		$nomU = htmlspecialchars($_POST['prenom']);
 		$passU = htmlspecialchars($_POST['pass']);

 		$user = new DbManager();
 		$r = $user -> teckDataUser($nomU,$passU);
        $compt = 0;

 		while ($dont = $r -> fetch()) {
 			$_SESSION['id'] = $dont['id'];
 			$_SESSION['nom'] = $dont['nom'];
      $_SESSION['prenom'] = $dont['prenom'];
      $_SESSION['pdp'] = $dont['pdp'];
      $_SESSION['utilisateur'] = $dont['utilisateur'];
      $_SESSION['roles'] = $dont['roles'];
      $_SESSION['sexe'] = $dont['sexe'];
 		  $compt ++;
 		}

    if ($compt == 0) {
      $_SESSION['err_nom'] = $nomU;
 			header('location:index.php?action=form-connexion&errAuth');

 		}else{
     setcookie('prenom', $nomU, time() + 365*24*3600, null,null, false, true);
       
     header('location:index.php?action=compte');

   }

 	}
 }

 function compte(){
 	if (!$_SESSION['id']) {
 		header('location:index.php');
 	}
     $dataUser = new DbManager();
     $data = $dataUser -> teckUser($_SESSION['nom']);
     $user = $dataUser -> teckUser($_SESSION['nom']);
     $pubs = $dataUser -> allPublishTeck();
     //$pub = publications();
    
     $statut = 0; //cette variable va nous permetre de savoir si l'utilisateur est nouveau ou pas

     if (isset($_GET['new'])) {
       $statut = 1;
     }
     
     require 'view/compte.php';

 }

 /** enssemble controleur pour le root user **/
 function rootControl(){
    if (isset($_POST['pass'])) {
      $pass = htmlspecialchars($_POST['pass']);
      if ($pass != 'touche me') {
        header('location:?action=root&err');
      }else{
        $_SESSION['root'] = $pass;
        header('location:?action=rootAccess');
      }
    }
 }

 //controle a l'access
 function rootAccess(){
   if (!$_SESSION['root']) {
      header('location:?action=root');
    }
   require 'view/root/home.php';
 }
 function rootUsers(){
  if (!$_SESSION['root']) {
      header('location:?action=root');
    }
  $datas = new DbManager();
   $user = $datas -> teckAllUser();
   $nb = $datas -> teckAllUser();

   require 'view/root/users.php';
 }

 function rootRequest(){
  if (!$_SESSION['root']) {
    header('location:?action=root');
  }
    require 'view/root/request.php';
 }

 function rootRequestSubmit(){
  if (isset($_POST['request'])) {
    $request = htmlspecialchars($_POST['request']);
    $datas = new DbManager();
    $rep = $datas -> doRequest($request);
    
     echo $rep ;
  }
 }

/***  fin de l'enssemble des controleurs **/

/** publication **/

  function publication(){
    if (isset($_FILES['photo_pub']) && isset($_POST['post'])) {
        $pd = $_FILES['photo_pub'];
       if ($pd['size'] <= 7000000)
                {
                     $infosfichier = pathinfo($pd['name']);
                     $extension_upload = $infosfichier['extension'];
                     $extensions_autorisees = array('jpg','gif','GIF', 'jpeg','JPG','JPEG','png','PNG');
                     $nomFichier = basename($_SESSION['id'].'-'.$pd['name']) ;

                     if (in_array($extension_upload,$extensions_autorisees)){
                           
                            move_uploaded_file($pd['tmp_name'], 'public/images/publication/' . $nomFichier);
                           
                          } else throw new Exception("Mauvaise extension du fichier");
                          
                          
                }
               

        $post = htmlspecialchars($_POST['post']);

        $datas = new DbManager();
        $savePub = $datas -> savePub($_SESSION['nom'],$_SESSION['prenom'],$nomFichier,$_SESSION['pdp'],$post);
        if ($savePub == 'true') {
          header('location:?action=compte');
        }
    }
  }

  function publications(){
    $datas = new DbManager();
    $pubs = $datas -> allPublishTeck();
     
    return $pubs ;
    
  }

/** publication  **/

 function logout(){
 	$_SESSION['id'];
 	session_destroy();
 setcookie('prenom', NULL, -1);
 	header('location:index.php?logout');
 }

 //fonction pour enregistrer l'adresse email de l'utilisateur lors de sa deconnexion
 function saveMail(){
  require 'view/mailSave.html';
  return true;
 }

 //fonction pour effectuer des differentes requette dans la bdd
 function requete(){
 	$act = new DbManager();
 	$result = $act -> requeteDB();
 	if ($result == true) {
 		echo 'Requette bien effectuer';
 	}
 }

  //fonction pour connecter automatiquement l'utilisateur si ses cookies sont actif
  function cooki(){
    
      $datas = new DbManager();
      $prenom = $_COOKIE['prenom'];
       $x = $datas -> connectWhiteCookies($prenom);
       $c = 0;
       while ($d = $x -> fetch()) {
        $_SESSION['id'] = $d['id'];
        $_SESSION['nom'] = $d['nom'];
        $_SESSION['prenom'] = $d['prenom'];
        $_SESSION['pdp'] = $d['pdp'];
        $_SESSION['utilisateur'] = $d['utilisateur'];
        $_SESSION['roles'] = $d['roles'];
        $_SESSION['sexe'] = $d['sexe']; 
         $c++;
       }
         header('location:?action=compte');
  }

 