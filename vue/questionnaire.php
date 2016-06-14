<?php
	session_start();

	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

	$iduser = GetIdUser($_SESSION['login']); //Renvoit l'id de l'utilisateur.

	//echo $_POST['categorie'];

	$nomTT = 'tt_'.$_SESSION['id'].$_SESSION['login'];

	MAJtt($nomTT, $_POST['categorie']);

	$listeQuestion = afficherTT($nomTT);



?>
