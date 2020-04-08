

<form method="post" action="?=mailAdd">
	<?= $_SESSION['prenom']; ?> donnez nous votre e-mail pour pouvoir re-innitialiser votre compte en cas d'oublie de mot de pass<br /><br />
	<input type="email" name="email" placeholder="e-mail" />
	<button type="submit">Envoyer</button>
</form>