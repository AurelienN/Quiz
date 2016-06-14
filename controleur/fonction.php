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

function GetHistoQuizUser($IdUser) //Retourne les scores et les types de quiz que l'utilisateur a fait.
{
	$quizs = recupHistoQuizUser($IdUser);

	foreach($quizs as $cle => $quiz)
	{
	    $quizs[$cle]['titre'] = htmlspecialchars($quiz['titre']);
	    $quizs[$cle]['Score'] = nl2br(htmlspecialchars($quiz['Score']));
	}

	include_once('..\vue\membreAffResul.php');
}

function GetNbQuiz() //Retourne le nombre de type de quiz
{
	$NbQuiz = CountQuiz();
	return $NbQuiz;
}

function AfficherListeQuiz() //retourne la liste des types de quiz disponible.
{
	$lquizs = recupListeQuiz();

	//return $ListeQuiz[0];

	foreach($lquizs as $cle => $lquiz)
	{
		$lquizs[$cle]['titre'] = htmlspecialchars($lquiz['titre']);
	
	}
	include_once('..\vue\quizAffResultat.php');
}


function Drop($name) //suppression de la tt
{
	DropTT($name);
}

function create($name) //création de la tt
{
	CreateTT($name);
}

function InsertTT($name, $idquiz) //ajout des données à la table tt
{
	MAJtt($name, $idquiz);
}

function afficherTT($name)
{
	$listeQuestions = GetTT($name);

	foreach($listeQuestions as $cle => $listeQuestion)
	{
		$listeQuestions[$cle]['id_question']=htmlspecialchars($listeQuestion['id_question']);
		$listeQuestions[$cle]['intitule']=htmlspecialchars($listeQuestion['intitule']);
	}

	include_once('..\vue\QuestionnaireAffResultat.php');

}
function NbRep($idquest)
{
	$Nbreponses = GetNbReponse($idquest);

	return $Nbreponses;
}