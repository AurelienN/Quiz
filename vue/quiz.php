<?php
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

	$iduser = GetIdUser($_SESSION['login']); //Renvoit l'id de l'utilisateur.

	$tt = 'tt_'.$_SESSION['id'].$_SESSION['login'];

	//echo $tt;

	//création de la table "temporaire"

	Drop($tt); //Suppression de la table temporaire

	Create($tt); //création de la table

	$ListeQuiz=AfficherListeQuiz(); //Renvoit la liste des quiz disponible.

	

?>