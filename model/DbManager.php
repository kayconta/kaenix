<?php
require_once 'Manager.php';

  /**
   * cette classe va faire des operations dans la base de donnee 
   */
  class DbManager extends Manager
  {
  	//function pour effecter des requettes dans la bdd
  	public function requeteDB(){

  		$db = $this -> dbConnect();
  		 $r = $db -> prepare("
              CREATE TABLE publication(
                       id INT NOT NULL AUTO_INCREMENT,
                       nom VARCHAR(255) NOT NULL,
                       prenom VARCHAR(255) NOT NULL,
                       photo VARCHAR(255) NOT NULL,
                       pdp VARCHAR(255) NOT NULL,
                       post TEXT NOT NULL,
                       date_post DATETIME NOT NULL,
                 PRIMARY KEY(id)
                   )
  			"); 

  	      $r -> execute();
      
  		return true;
  	}

/** enssemble de methode pour root user **/

    public function teckAllUser(){
      $db = $this -> dbConnect();
      $r = $db -> prepare('SELECT * FROM perso ORDER BY date_inscription DESC');
      $r -> execute();
      return $r;
    }

   public function doRequest($request){
     $db = $this -> dbConnect();
     
     try{
       
       $statut ;

       $r = $db -> prepare($request);
       $r -> execute();
       }catch(Exeption $e){ //si il ya eu une erreur
           $statut = 'erreur :' . $e -> getMessage();
       }
     return $statut;
   }
/** fin enssemble de methode pour root user **/

  	//`function pour enregistrer les nouveaux utilisateurs
  	public function saveUsers($nom,$prenom,$nomIRL,$pass,$pdp,$description,$sexe){
  		$db = $this -> dbConnect();

  		 $r = $db -> prepare('INSERT INTO perso VALUES(0, :n, :p,  :nom, :ROLE_USER, :pas, :pd, :description, :sexe ,NOW())');
  		$r -> execute(array(
          'n' => $nom,
          'p' => $prenom,
          'nom' => $nomIRL,
          'pas' => $pass,
          'pd' => $pdp,
          'ROLE_USER' => 'ROLE_USER',
          'description' => $description,
          'sexe' => $sexe
  		));

  		return true;
  	}

/** pub **/

       public function savePub($nom,$prenom,$nomF,$pdp,$post){
        $db = $this -> dbConnect();
        $r = $db -> prepare('INSERT INTO publication VALUES(0, :nom, :prenom, :pt, :pdp, :post, NOW() )');
        $r -> execute(array(
           'post' => $post,
           'pt' => $nomF,
           'nom' => $nom,
           'prenom' => $prenom,
           'pdp' => $pdp,
          
        ));

        return true;
       }

       public function allPublishTeck(){
         $db = $this -> dbConnect();
         $r = $db -> prepare('SELECT * FROM publication ORDER BY date_post DESC LIMIT 0,70 ');
         $r -> execute();
         return $r;
       }

/** pub **/
  //fonction pour faire la requette dans la table perso
  	public function teckUser($nom){

  		$db = $this -> dbConnect();
  		$r = $db -> prepare('SELECT * FROM perso WHERE nom= :user');

  		$r -> execute(array(
            'user' => $nom
  		));

  		return $r;
  	}

  	//fonction pour reccuperer la requette dans la table perso en fonction du nom IRL
  	public function teckDataUser($utilisateur,$pass){
  		$db = $this -> dbConnect();
  		$r = $db -> prepare('SELECT * FROM perso WHERE prenom= :user AND pass = :pas');
         
         $r -> execute(array(
            'user' => $utilisateur,
            'pas' => $pass,
  		));

  		return $r;
  	}

    //function pour lire les valeurs en fonction du cookie
    public function connectWhiteCookies($cook){
       $db = $this -> dbConnect();
       $r = $db -> prepare('SELECT * FROM perso WHERE prenom = :prenom');
       $r -> execute(array(
          'prenom' => $cook
       ));
       
         return $r;
    }


  }