<?php
 require_once 'Manager.php';

  /**
   * cette classe va faire des operations dans la base de donnee 
   */
  class DbManager extends Manager
  {
  	// function pour recuperer le nombre de garcon 
  	public function nombreDeGarcon(){
  		$db = $this -> dbConnect();
         
         $garcon = $db -> prepare('SELECT * FROM users WHERE sexe = :s');
         $garcon -> execute(array('s' => 'm'));

         return $garcon;
  	}

  	//methode pour recuperer le nombre de filles 
  	public function nombre_de_fille(){
  		$db = $this -> dbConnect();
         
         $fille = $db -> prepare('SELECT * FROM users WHERE sexe = :s');
         $fille -> execute(array('s' => 'f'));

         return $fille;
  	}

    //methode pour recuperer le nombre d'administrateurs 
    public function nombre_admin(){
    	$db = $this -> dbConnect();
         
         $admin = $db -> prepare('SELECT * FROM admin');
         $admin -> execute();

         return $admin;
    }

    //methode pour recuperer le nombre de livre 
    public function nombre_book(){
    	$db = $this -> dbConnect();
         
         $book = $db -> prepare('SELECT * FROM books');
         $book -> execute();

         return $book;
    }

    //methode pour recuperer le nombre d'utilisateurs
    public function nombre_user(){
    	$db = $this -> dbConnect();
         
         $user = $db -> prepare('SELECT * FROM users');
         $user -> execute();

         return $user;
    }

    //methode de test pour ajouter une colone a une table
    public function addColumn(){
      $db = $this -> dbConnect();

        $req = $db -> prepare('ALTER TABLE users ADD COLUMN pdp TEXT NOT NULL');
        $req -> execute();
        return true;
    }

    //methode pour recuperer les livres en fonction de leurs code
    public function code_book($code){
      $db = $this -> dbConnect();
      $req = $db -> prepare('SELECT * FROM books WHERE code = :code');
        $req -> execute(array('code' => $code ));
        return $req ;
    }

  //methode pour mettre les photos des utilisateurs a jours
    public function update_pdp($pseudo,$pdp){
      $db = $this -> dbConnect();
      $req = $db -> prepare('UPDATE users SET pdp = :pdp WHERE pseudo = :pseudo');
        $req -> execute(array(
           'pdp' => $pdp,
           'pseudo' => $pseudo
         ));
        return $req ;
    }

  //methode pour recuperer les photos de profil des utilisateurs
    public function pdp_user($pseudo){
      $db = $this -> dbConnect();
      $req = $db -> prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req -> execute(array(
           'pseudo' => $pseudo
         ));
        return $req ;
    }

  }