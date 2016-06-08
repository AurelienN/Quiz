<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/modele/ListeRequete.php');

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
			header('Location: vue\membre.php');
			break;
		default:
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
			return $erreur;
			break;
	}
}

function VerifMail($email)
{
	// Déclaration de la regex permettant de vérifier l'adresse email
	$mailRegex = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";

	$VerifMail = preg_match($mailRegex, $email);

	//return $mailverif;
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

function GetIdUser($login)
{
	$iduser = recupIDuser($login);

	$_SESSION['id'] = $iduser[0];
	return $iduser[0];
}

function GetHistoQuizUser($IdUser)
{
	$quizs = recupHistoQuizUser($IdUser);

	foreach($quizs as $cle => $quiz)
	{
	    $quizs[$cle]['titre'] = htmlspecialchars($quiz['titre']);
	    $quizs[$cle]['Score'] = nl2br(htmlspecialchars($quiz['Score']));
	}

	include_once('..\vue\membreAffResul.php');
}