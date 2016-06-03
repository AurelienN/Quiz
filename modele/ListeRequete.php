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