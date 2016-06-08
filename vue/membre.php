<?php
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

	$iduser = GetIdUser($_SESSION['login']);

	//print_r($iduser);
?>

<?php include("entete2.php"); ?>
<title>Espace membre</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> votre id est : <?php echo $_SESSION['id']; ?> et bienvenue sur le quiz !<br />

<a href="deconnexion.php">Déconnexion</a>
</body>
</html>