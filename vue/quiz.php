<?php
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

	$iduser = GetIdUser($_SESSION['login']); //Renvoit l'id de l'utilisateur.

	$NbQuiz=GetNbQuiz(); //Renvoit le nombre de type de quiz différent.

	$ListeQuiz=AfficherListeQuiz(); //Renvoit la liste des quiz disponible.

	

?>