
<?php
 /**
  * cette classe servira de connection pour a la base de donnee
  */
 class Manager
 {
 	protected function dbConnect(){

 	  try{
 		$bdd = new PDO('mysql:host=localhost;dbname=kaenix', 'loic', 'loic237');
          //$bdd = new PDO('mysql:host=localhost;dbname=allotr578_bibliotheque', 'allotr578_biblio', 'bibliotheque');
 		}catch(Exeption $e){ //si il ya eu une erreur
   echo 'erreur :' . $e -> getMessage();
   }
           return $bdd;
 	}

 }