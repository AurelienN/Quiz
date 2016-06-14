<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/modele/bdd.php');

function recupinfouser($login, $pass)
{
		
		$bdd=connexion();

		// on teste si une entrée de la base contient ce couple login / pass
		$RecupInfoUser = $bdd->prepare('SELECT count(*) FROM user WHERE pseudo = :pseudo AND password = :passwd');

		//echo $login & ' ' & $pass;

		$RecupInfoUser-> execute(array(
			'pseudo' => $login,
			'passwd' => sha1($pass)
			));

		$result = $RecupInfoUser->fetch();

		return $result;
}

function createuser($login, $pass, $mail)
{
				$bdd = connexion();

				$NewUser = $bdd->prepare('INSERT INTO user(pseudo, password, email,	avg_score, nb_quiz, date_inscription) VALUES(:pseudo, :password, :email, 0, 0, NOW())');

				//execution de la requete avec les paramètres
				$NewUser->execute(array(
					'pseudo' => $login,
					'password' =>sha1($pass),
					'email' => $mail
					));
}

function recupIDuser($login)
{
		
		$bdd=connexion();

		// on teste si une entrée de la base contient ce couple login / pass
		$RecupInfoUser = $bdd->prepare('SELECT id FROM user WHERE pseudo = :pseudo');

		//echo $login & ' ' & $pass;

		$RecupInfoUser-> execute(array(
			'pseudo' => $login
			));

		$iduser = $RecupInfoUser->fetch();

		return $iduser;
}

function recupHistoQuizUser($iduser)
{
		
		$bdd=connexion();

		// on teste si une entrée de la base contient ce couple login / pass
		$RecupInfoUser = $bdd->prepare('SELECT q.titre as titre, ROUND(sum(h.score_brute)/sum(h.nb_question)*100) AS Score
										FROM historique h	
										INNER JOIN quiz q on h.quiz_id = q.id
										where h.user_id = :id
										GROUP BY 1');

		//echo $login & ' ' & $pass;

		$RecupInfoUser-> execute(array(
			'id' => $iduser
			));

		//$iduser = $RecupInfoUser->fetch();
		$quizs = $RecupInfoUser->fetchAll();
		
		return $quizs;
}

function GetNbRepParQuestion($idquestion)
{
	$bdd=connexion();

	$nbrepparque = $bdd->prepare('SELECT count(*) FROM reponse WHERE question_id = :id');
	$nbrepparque->execute(array('id' => $idquestion));
	$NbRep = $nbrepparque->fetch();

	return $NbRep;
}

function recupListeQuiz()
{
	$bdd=connexion();

	$RecuplisteQuiz=$bdd->prepare('SELECT distinct id, titre FROM quiz ORDER BY 2');
	$RecuplisteQuiz->execute();
	$listeQuiz=$RecuplisteQuiz->fetchAll();

	return $listeQuiz;
}

function CountQuiz()
{
	$bdd=connexion();

	$RecupNbQuiz=$bdd->prepare('SELECT count(*) FROM quiz');
	$RecupNbQuiz->execute();
	$NbQuiz=$RecupNbQuiz->fetch();

	return $NbQuiz;
}

function DropTT($name)
{
	$bdd=connexion();

	$DropTT=$bdd->prepare('DROP TABLE IF EXISTS '. $name );
	$DropTT->execute();
}

function CreateTT($name)
{
	$bdd=connexion();

	$requete='CREATE TABLE IF NOT EXISTS '. $name .'(ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_question INT(10) UNSIGNED, intitule VARCHAR(255), id_reponse INT(10) UNSIGNED, intitule_reponse VARCHAR(255), bonne_reponse INT(10), reponse_user INT(10))';
	
	$CreateTT=$bdd->exec($requete);

}