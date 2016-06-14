<?php
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

	$iduser = GetIdUser($_SESSION['login']); //Renvoit l'id de l'utilisateur.

	echo $_POST['categorie'];

?>

<?php include("entete2.php"); ?>
<title>Espace membre</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<br>
	<a href="membre.php">Retour à la page d'accueil</a>
	<?php echo $_SESSION['id'].$_SESSION['login']; ?>
</body>
</body>
</html>