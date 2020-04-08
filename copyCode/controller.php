<?php
  require 'model/model.php';
  

//connexion 
  function connecti(){
  	
  	if (isset($_POST['pd']) && isset($_POST['ps'])) {
  		$pseudo = htmlspecialchars($_POST['pd']);
  		$pass = htmlspecialchars($_POST['ps']);
  		$compt = 0;
         session_start();
         $r = logUser($pseudo,$pass);
  		while ($donnees = $r -> fetch()) {
      	
      	$_SESSION['pseudo'] = $donnees['pseudo'];
      	$compt++;
      }
       if ($compt == 0) {
      	//echo 'erreur de connexion ';
        header('location:index.php?action=error-connexion');
      }else header('location:index.php?action=home');

  	}
  }
  function redirect(){
      header('location:index.php?action=home');
  }


//add   
  function save(){
  if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['pass']) &&isset($_POST['phone']) && isset($_POST['sexe']) && isset($_POST['domaine']) && isset($_POST['mail'])) {
    // securisation des infos pris dans le formulaire 
  	$nom = htmlspecialchars($_POST['nom']);
  	$prenom = htmlspecialchars($_POST['prenom']);
  	$pseudo = htmlspecialchars($_POST['pseudo']);
  	$pass = htmlspecialchars($_POST['pass']);
  	$sexe = htmlspecialchars($_POST['sexe']);
    $phone = htmlspecialchars($_POST['phone']);
    $domaine = htmlspecialchars($_POST['domaine']);
    $email = htmlspecialchars($_POST['mail']);
    $pdp = 'stock_people.png';
  	$compt = 0;
      
      //insertion des infos dans la base de donnees et on aaffecte le domaine de l'utilisateur dans la variable $dom
        //verifions avant si le pseudo et le l'email ne sont pas encore pris
           $re = preload();
        
           $pseudoPris = false; // variable pour savoir si le pseudo est pris ou non (boleen)
           while($donnee = $re -> fetch()) {
             //creons une condition pour savoir si le pseudo est pris ou non. si il est pris, on change le boleen
             if($donnee['pseudo'] == $pseudo){ $pseudoPris = true ; }
             
           }

           if ($pseudoPris == false) {
               $dom = insertUser($nom, $prenom, $pseudo, $pass, $sexe, $phone, $domaine, $email,$pdp);
           }
              //verifions si il s'agit du pseudo
               if ($pseudoPris == true) {
                 //PMP = Pseudo et Mot de pass deja Pris
                 //val = valeur
                   header('location:index.php?action=PMP&val=' . $pseudo);
               }
               
                
             
      
      //lecture des infos dans la base de donnees et activation des sessions
      session_start();
      $r = logUser($pseudo,$pass);
      //while ($donnees = $r -> fetch()) {
        $_SESSION['pseudo'] = $pseudo;
        
     // }
       //si c'est un etudiant de la programmation
      if ($dom == 'programmation') {
        header('location:index.php?action=s-programmation');
      }
      //si il fait de la video surveillance
      if ($dom == 'videos-surveillance') {
        header('location:index.php?action=s-video');
      }
      //si il fait de la robotique
      if ($dom == 'robotique') {
        header('location:index.php?action=s-robotique');
      }

  	  
  	  
    //header('location:index.php?action=home');
  }
 }
 

 //fonction qui controlle le chargement des livres 
 function teckBook($pseudo){
   $cat = categorie($pseudo);
   $x='';
     while ($don = $cat -> fetch()) {
        $x = $don['dom'];
      }
   $r = fetchBook($x);
   return $r;
 }

 //fonction de control de lajout du domaine
 function addBookAction($pseudo){
  
    $html = htmlspecialchars($_POST['html']);
    $javascript = htmlspecialchars($_POST['javascript']);
    $css = htmlspecialchars($_POST['css']);
    $python = htmlspecialchars($_POST['python']);
    $c = htmlspecialchars($_POST['c++']);
    $java = htmlspecialchars($_POST['java']);
    $php = htmlspecialchars($_POST['php']);
    $langage = '';
      // reunissons tout les langage dans un tableau
       $list = array($html,$javascript,$css,$python,$c,$java,$php);
       //parcourons avec une boucle
       for ($i=0; $i < 7; $i++) { 
        if(!empty($list[$i])){
          addDamaine($pseudo,htmlspecialchars($list[$i]));
        }
       }

 }

 //fonction pour enregistrer les autre filiere
 function dom($pseud,$dom){
   addDamaine($pseud,$dom);
 }

//fonction de controle des langages
function fineL($pseudo){
  return fineLang($pseudo);
}
//fonction de controle de changement de livre
function changeB(){
  if (isset($_POST['lang'])) {
    
    $x = changeBook($_POST['lang']);
  }
  
  return $x;
}

//fonction de controle pour l'afficharge des utilisateurs
function allUser(){
  return load();
}

function jout($pseudo,$id){
  favorieBook($pseudo,$id);
}

//fonction de control des livres favorie
function favoriesAction($id){
  return findFavorie($id);
}

function nn($id){
  return findL($id);
}
//fonction pour charger l'id du livre en fonction du pseudo
function repId($pseudo){

  $idLivre = reIdm($pseudo);
  $idb = array();
  while ($d = $idLivre -> fetch()) {
    $idb = $d['idBook'];
  }
  return $idb ;
}

//fonction de controle pour charger les livres en fonction des categories
function book_categorie_action($c){
  return book_categorie($c);
}

function nbBookControl(){

  $n = nbBook() ;
  $compt = 0;
  while ($d = $n -> fetch()) {
    $compt++;
  }
  return $compt;
}

function nbuserControl(){
  $n = nbUser();
  $compt = 0;
  while ($d = $n -> fetch()) {
    $compt ++;
  }
  return $compt;
}

//creation du controller pour authentifier le nouvel utilisateur
function rootController(){
  if (isset($_POST['p'])) {
    $pass = htmlspecialchars($_POST['p']);

    $bool = false;

    $root_pass = 'Loic237'; //le vrai mot de passe
//on verifie maintenant si le mot de passe entrer est egal au bon mot de passe
    if ($pass == $root_pass) {
       $bool = true;
    }
  }

  return $bool;
}

/*creons une fonction mere dans notre controleur
function main_c($objet,$critaire,$critaire2,$table){
    $n = main($objet,$critaire,$critaire2,$table);
    $compteur = 0 ;
    while ($don = $n -> fetch()) {
      $compteur++;
    }
    return $compteur ;
}*/