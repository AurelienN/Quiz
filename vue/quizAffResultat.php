<?php include("entete2.php"); ?>
<title>Quiz</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<h3>A quel type de quiz souhaitez-vous répondre?</h3>
	<br>
	<form method="post" action="questionnaire.php">
	 	<?php
			foreach($lquizs as $lquiz)
			{
		?>
			<input type="radio" name="categorie" value="<?php echo $lquiz['id']; ?>" id="<?php echo $lquiz['id']; ?>" /> <label for="<?php echo $lquiz['id']; ?>"> <?php echo $lquiz['titre']; ?> </label>
			<br><br>
		<?php
			}
		?>
		<input type="submit" value="Valider" />
	</form>
	<br>
<!-- <a href="deconnexion.php">Déconnexion</a> -->
</body>
</html>



 
