<?php
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');

	$iduser = GetIdUser($_SESSION['login']);

	//print_r($iduser);
?>

<?php include("entete2.php"); ?>
<title>Quiz</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
<div class="User">
	Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> </div> 
	<br>
	<em> et bon courage pour le quiz !</em> 
	<br>

<!-- Affichage de l'historique -->
<?php GetHistoQuizUser($iduser) ?>

<!-- Accès aux Quizs -->
<a href="quiz.php">Accéder aux quiz</a>
<br>
<!-- Lien de déconnexion -->
<a href="deconnexion.php">Déconnexion</a>

<?php echo $_SESSION['id'].$_SESSION['login']; ?>
</body>
</html>