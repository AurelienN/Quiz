<?php

function verifcompte($result, $login)
{
	//print_r($result);
	// si on obtient une réponse, alors l'utilisateur est un membre
	switch ($result[0]) {
		case '0':
			$erreur = 'Merci de bien vouloir créer votre compte pour accèder aux quiz.';
			return $erreur;
			break;
		case '1':
			session_start();
			$_SESSION['login'] = $login;
			header('Location: membre.php');
			break;
		default:
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
			return $erreur;
			break;
	}
}

function redirection($login)
{
	session_start();
	$_SESSION['login'] = $login;
	header('Location: membre.php');
	exit();
}

function deconnexion()
{
	session_start();
	session_unset();
	session_destroy();
	header('Location: ..\index.php');
	exit();
}

function verifSetLogin($login)
{
	session_start();
	if (!isset($login)) {
		header ('Location: ..\index.php');
		exit();
	}
}