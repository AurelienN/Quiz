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

				$NewUser = $bdd->prepare('INSERT INTO user(pseudo, password, email, date_inscription) VALUES(:pseudo, :password, :email, NOW())');

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
		$RecupInfoUser = $bdd->prepare('SELECT q.titre as titre, ROUND((h.score_brut/h.nb_question)*100) AS Score
										FROM historique h	
										INNER JOIN quiz q on h.quiz_id = q.id
										where h.user_id = :id');

		//echo $login & ' ' & $pass;

		$RecupInfoUser-> execute(array(
			'id' => $iduser
			));

		//$iduser = $RecupInfoUser->fetch();
		$quizs = $RecupInfoUser->fetchAll();
		
		return $quizs;
}