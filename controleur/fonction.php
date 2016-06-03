<?php

function verifcompte($result, $login)
{
	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($result[0] == 1) 
	{
		session_start();
		$_SESSION['login'] = $login;
		header('Location: vue/membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($result[0] == 0) 
	{
		$erreur = 'Compte non reconnu.';
		return $erreur;
	}
	// sinon, alors la, il y a un gros problème :)
	else 
	{
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
		return $erreur;
	}
}

function redirection($login)
{
	session_start();
	$_SESSION['login'] = $login;
	header('Location: ..\vue\membre.php');
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