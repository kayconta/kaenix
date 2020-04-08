<!DOCTYPE html>
<html>
<head>
	<title>root user</title>
	<meta charset="utf-8">
</head>
<body>
   <center>
   	<form method="post" action="?action=rootControl">
   		<h2>Root user</h2>
   		<p><?= $erreur; ?></p>
   		<input type="password" name="pass" placeholder="password">
   		<button type="submit"> connexion </button>
   		
   	</form>
   </center>
</body>
</html>