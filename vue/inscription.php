<?php

//define('__ROOT__', dirname(dirname(__FILE__))); 
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') 
{
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm'])) && (isset($_POST['mail']) && !empty($_POST['mail']) )) 
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/modele/ListeRequete.php');

		require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

		//Vérification de l'existance du Login/Mot de passe 
		$result=recupinfouser($_POST['login'], $_POST['pass']);

		// Affichage de la page membre si le login / mot de passe sont bons.
		verifcompte($result, $_POST['login']);

			if ($result[0] == 0) 
			{
				createuser($_POST['login'], $_POST['pass'], $_POST['mail']);
				redirection($_POST['login']);
			}
			else 
			{
				$erreur = 'Un membre possède déjà ce login.';
			}
	}
	else 
	{
		$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<html>
<head>
<title>Inscription</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
Inscription à l'espace membre :<br />
<form action="inscription.php" method="post">
Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
Adresse e-mail : <input type="text" name="mail" value="<?php if (isset($_POST['mail'])) echo htmlentities(trim($_POST['mail'])); ?>"><br />
<input type="submit" name="inscription" value="Inscription">
</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
</html>