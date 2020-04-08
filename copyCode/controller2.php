<?php
require_once 'model/DbManager.php';

 function nb_garcon(){
 	$garcon = new DbManager();
 	$nb_g = $garcon -> nombreDeGarcon();
 	$compteur = 0 ;

 	while ($don = $nb_g -> fetch()) {
 		$compteur ++;
 	}
 	return $compteur;
 }

 //nb gfille controller
 function nb_fille(){
 	$fille = new DbManager();
 	$nb_f = $fille -> nombre_de_fille();
 	$compteur = 0 ;

 	while ($don = $nb_f -> fetch()) {
 		$compteur ++;
 	}
 	return $compteur;
 }

 //nb admin controller
 function nb_admin(){
 	$mind = new DbManager();
 	$nb_mind = $mind -> nombre_admin();
 	$compteur = 0 ;

 	while ($don = $nb_mind -> fetch()) {
 		$compteur ++;
 	}
 	return $compteur;
 }

 //nb de livres
 function nb_book(){
 	$book = new DbManager();
 	$nb_book = $book -> nombre_book();
 	$compteur = 0 ;

 	while ($don = $nb_book -> fetch()) {
 		$compteur ++;
 	}
 	return $compteur;
 }

 function nb_user(){
 	$user = new DbManager();
 	$nb_user = $user -> nombre_user();
 	$compteur = 0 ;

 	while ($don = $nb_user -> fetch()) {
 		$compteur ++;
 	}
 	return $compteur;
 }

 //fonction de controlle pour effectuer des requettes dans la base de donnees
 function addC(){
 	$re = new DbManager();
 	$result = $re -> addColumn();
 	if ($result == true){
 		echo 'colone bien ajouter ';
 	}
 } 

 //function de controlle pour selectionnee les livres appartir du code
 function b_code($code){
 	$re = new DbManager();
 	$book = $re -> code_book($code);
 	return $book ;
 } 

 //fonction de controle pour le changement de la photo de profile
 function update_photo($pseudo,$pd){
 	if (isset($pd) && $pd['error']== 0){
            
            if ($pd['size'] <= 7000000)
                {
                     $infosfichier = pathinfo($pd['name']);
                     $extension_upload = $infosfichier['extension'];
                     $extensions_autorisees = array('jpg', 'jpeg','JPG','JPEG','png','PNG');
                     $nomFichier = basename($pd['name']) ;

                     if (in_array($extension_upload,$extensions_autorisees)){

                     	      move_uploaded_file($pd['tmp_name'], 'admin/fichiers/photos/' . basename($pd['name']));
                     	      $re = new DbManager();
                     	      $re -> update_pdp($pseudo,$nomFichier); 
                                   return true;
                          }
                }else echo 'erreur de taille du fichiers ';
                

  	   }
 }

 //fonction de control pour recup les les info de l'utilisateur
 function pdp_user_control($pseudo){
 	$re = new DbManager();
 	$info = $re -> pdp_user($pseudo);
 	return $info ;
 }