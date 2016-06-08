<?php

//define('__ROOT__', dirname(dirname(__FILE__))); 
 
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') 
{
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) 
	{

		require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/modele/ListeRequete.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

		//$bdd=connexion();
		$erreur = '';
		//print_r($bdd);
		//Vérification de l'existance du Login/Mot de passe 
		$result=recupinfouser($_POST['login'], $_POST['pass']);

		// Affichage de la page membre si le login / mot de passe sont bons.
		$erreur = verifcompte($result, $_POST['login']);

		//echo $erreur;
	}
	else 
	{
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<?php include("vue/entete.php"); ?>

<title>Accueil</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
Connexion à l'espace membre :<br />
	<form action="index.php" method="post">
		Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
		Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
	<input type="submit" name="connexion" value="Connexion">
	</form>
<a href="vue\inscription.php">Vous inscrire</a>
<?php
	if (isset($erreur)) echo '<br /><br /><p class="erreur"> Erreur : ',$erreur;
?>
</body>
</html>