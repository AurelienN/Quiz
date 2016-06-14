
<?php include("entete2.php"); ?>
<title>Questionnaire</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<br>
	<table>
		<caption>Vos résultats aux Quiz.</caption>
		<tr>
			<th class="quiz">Intitulé</th>
			<th class="quiz">Réponse</th>
		</tr>
	<?php
		foreach($listeQuestions as $listeQuestion)
		{
	?>
		<tr class="question">
			<td class="question"><?php echo $listeQuestion['intitule']; ?></td>
			<td class="reponse">
			<?php 
				$Nbreponses = NbRep($listeQuestion['id_question']); //récupération du nombre de réponse par question pour création de la boucle d'affichage des réponses.
				//echo $Nbreponses;
			?></td>
		</tr>
		<br><br>
	<?php
		}
	?>
	</table>
	<br>
	<a href="membre.php">Retour à la page d'accueil</a>
	
</body>
</body>
</html>