<?php

 /**
  * cette classe servira de connection pour a la base de donnee
  */
 class Manager
 {
 	protected function dbConnect(){
 		$bdd = new PDO('mysql:host=localhost;dbname=allotr578_bibliotheque', 'allotr578_biblio', 'bibliotheque');
          // $bdd = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
    
           return $bdd;
 	}
 }