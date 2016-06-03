<?php
	session_start();
?>

<html>
<head>
<title>Espace membre</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br />
<a href="deconnexion.php">Déconnexion</a>
</body>
</html>