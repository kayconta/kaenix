<?php 

  function dbConnect(){
     
         $bdd = new PDO('mysql:host=localhost;dbname=allotr578_bibliotheque', 'allotr578_biblio', 'bibliotheque');
           //$bdd = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
    
           return $bdd;
  }

  function insertUser($nom,$prenom,$pseudo,$pass,$sexe,$phone,$domaine,$email,$pdp){
  	$db = dbConnect();
     $req = $db -> prepare('INSERT INTO users VALUES(0,:nom, :prenom, :pseudo, :pass, :sexe, :m, :domaine, :num, NOW(), :pdp)');
     $req -> execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'pass' => $pass,
            'sexe' => $sexe,
            'm' => $email,
            'domaine' => $domaine,
            'num' => $phone,
            'pdp' => $pdp
            
     ));
     return $domaine;
}

  function logUser($pseudo, $pass){
  	$db = dbConnect();
  	$req = $db -> prepare('SELECT * FROM users WHERE pseudo = :pseudo AND pass = :pass');
  	$req -> execute(array(
       'pseudo' => $pseudo,
       'pass' => $pass
  	));

  	return $req;
  }
//fonction de control pour savoirles mails et pseudos pris
  function preload(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM users ');
    $req -> execute();

    return $req;
  }

//fonction pour charger les differents categories
  function categorie($pseudo){
    $db = dbConnect();
    $r = $db -> prepare('SELECT * FROM domaine WHERE pseudo = :pseudo LIMIT 0,1');
    $r -> execute(array('pseudo' => $pseudo));
      return $r;
  }

//fonction qui cherches tout les livres dans la base de donnee
  function fetchBook(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM books  ORDER BY id DESC LIMIT 0,10');
    $req -> execute(array());
    
    return $req;
  }

  //fonction qui ajoute les langages des utilisateurs
  function addDamaine($pseudo,$dom){
    $db = dbConnect();
    $req = $db -> prepare('INSERT INTO domaine VALUES(0, :pseudo, :dom, NOW())');
    $req -> execute(array(
       'pseudo' => $pseudo,
       'dom' => $dom
    ));
  }

//fonction pour recuperer les langages de programmation de l'utilisateur et afficher au dessus de la zone de recherche
function fineLang($pseudo){
  $db = dbConnect();
  $req = $db -> prepare('SELECT dom FROM domaine WHERE pseudo = :pseudo');
  $req -> execute(array(
     'pseudo' => $pseudo
  ));

  return $req;
}

//fonction pour changer l'afficharge des livres apres selection a l'entete.
function changeBook($code){
  $db = dbConnect();
  $req = $db -> prepare('SELECT * FROM books WHERE categorie = :code ORDER BY id DESC LIMIT 0,10');
  $req -> execute(array(
     'code' => $code
  ));

  return $req;
}

//fonction pour charger les dommaines en fonction du pseudo
  function load(){
    $db = dbConnect();
  $req = $db -> prepare('SELECT * FROM users');
  $req -> execute();

  return $req;
  }
//fonction pour inserer les livres favories de l'utilisateurs
  function favorieBook($pseudo,$id){
     $db = dbConnect();
       $req = $db -> prepare('INSERT INTO favories VALUES(0, :idb, :pseudo,NOW())');
       $req -> execute(array(
        'idb' => $id,
        'pseudo' => $pseudo
      ));
  }

//fonction pour recuperer les les infos dans la table favories
 function findFavorie($id){
    $db = dbConnect();
       $req = $db -> prepare('SELECT * FROM favories WHERE idBook = :id');
       $req -> execute(array(
        'id' => $id
      ));
       return $req;
 }
 
 //pour prendre les livres favories
 function findL($id){
    $db = dbConnect();
       $req = $db -> prepare('SELECT * FROM books WHERE id = :id');
       $req -> execute(array(
        'id' => $id
      ));
       return $req;
 }
 //function de req pour chrger les livres en fonction du pseudo
 function reIdm($pseudo){
     $db = dbConnect();
       $req = $db -> prepare('SELECT * FROM books WHERE pseudo = :ps');
       $req -> execute(array(
        'ps' => $pseudo
      ));
       return $req;
 }

//fonction de re pour charger les livres en fonction de la categorie choisir 
function book_categorie($cat){
     $db = dbConnect();
       $req = $db -> prepare('SELECT * FROM books WHERE categorie = :c ORDER BY id DESC LIMIT 0,15');
       $req -> execute(array(
        'c' => $cat 
      ));
       return $req;

}

function nbBook(){
  $db = dbConnect();
       $req = $db -> prepare('SELECT * FROM books');
       $req -> execute();
     return $req;
}

function nbUser(){
  $db = dbConnect();
       $req = $db -> prepare('SELECT id FROM users');
       $req -> execute();
     return $req;
}

//ici nous allons coder un ou plusieurs fonctions qui permete de faire des reques pours nos statistiques
// fonction main. la fonction mere
function main($objet,$critaire,$critaire2,$table){
    $db = dbConnect();
       $req = $db -> prepare('SELECT :ob FROM :tab WHERE :crit = :crit2');
       $req -> execute(array(
         'ob' => $objet,
         'tab' =>$table,
         'crit' => $critaire,
         'crit2' => $critaire2
       ));
     return $req;
}
//fin fonction mere. 

 

