<!DOCTYPE html>
<html>
<head>
	<title>users plate-form</title>
	<meta charset="utf-8">
	<style type="text/css">
		.div{
			width: 99px
			border:2px solid black;
			padding: 1%;
			margin: 1%;
		}
	</style>
</head>
<body>
  <?php 
    $compt = 0;
    while ($n = $nb -> fetch()) {
    	$compt++;
    }
  ?>
 	<h2>utilisateurs inscrit <?= $compt; ?></h2>
 	<?php 
      while ($don = $user -> fetch()) {
    ?>
      <div class="div">
           <img src="public/images/pdp/<?= $don['pdp']; ?>" height="50px" width="50px" style="border-radius: 100%;" title="<?= $don['nom']; ?>" > <h4 style="display: inline;"><?= $don['nom']; ?>(<?= $don['utilisateur']; ?>)</h4>
      </div>

    <?php
      }

 	?>
 
</body>
</html>