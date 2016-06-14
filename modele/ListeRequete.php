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

function DropTT($name) //supprimer la table temporaire 
{
	$bdd=connexion();

	$DropTT=$bdd->prepare('DROP TABLE IF EXISTS '. $name );
	$DropTT->execute();
}

function CreateTT($name) //créer la table temporaire 
{
	$bdd=connexion();

	$requete='CREATE TABLE IF NOT EXISTS '. $name .'(ID INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_question INT(100) UNSIGNED, intitule VARCHAR(255), id_bonne_reponse int(100), id_reponse_user INT(100))';
	
	$CreateTT=$bdd->exec($requete);
}

function MAJtt($name, $idquiz) //Sélection des questions
{
	$bdd=connexion();
	$insert='INSERT INTO '. $name .'(id_question, intitule)
				SELECT q.id, q.intitule FROM question q WHERE q.quiz_id = '. $idquiz .' ORDER BY RAND() LIMIT 0, 10';
	$insertTT=$bdd->exec($insert);
}

function GetTT($name) //récupération des questions
{
	$bdd=connexion();

	$RecuplisteQuiz=$bdd->prepare('SELECT * FROM '. $name);
	$RecuplisteQuiz->execute();
	$listeQuestion=$RecuplisteQuiz->fetchAll();

	return $listeQuestion;
}

function GetNbReponse($id_question) //récupération des réponses
{
	$bdd=connexion();

	$req='SELECT count(id) as NbRep FROM reponse WHERE question_id = ' . $id_question;

	//echo $req;

	$Nbreponses=$bdd->prepare($req);
	$Nbreponses->execute();
	$NbRep=$Nbreponses->fetch();

	//print_r($NbRep['NbRep']);

	//echo $Nbreponses;

	return $Nbreponses;

	//$nbreps=$Nbreponses->fetch();
}