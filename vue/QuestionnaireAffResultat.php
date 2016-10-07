
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
		<tr class="quiz">
			<td class="quiz"><?php echo $listeQuestion['intitule']; ?></td>
			<td class="reponse">
			
			<?php 
				//$Nbreponses = NbRep($listeQuestion['id_question']); //récupération du nombre de réponse par question pour création de la boucle d'affichage des réponses.
				//print_r($listeQuestion['id_question']);
				require_once($_SERVER['DOCUMENT_ROOT'].'/TP_openclassroom/03-Quiz/controleur/fonction.php');
				//echo $listeQuestion['id_question'];
				$Reponse = reponses($listeQuestion['id_question']);
				//print_r($Reponse);
				$Nbreponses=NbRep($listeQuestion['id_question']);
				//print_r($Nbreponses['NbRep']);

				$nb_rep = $Nbreponses['NbRep'];
				$success = settype($nb_rep, "int"); // Sert à transformer le string provenant de l'array en integer pour la boucle du while.
				//echo $nb_rep;

				//affichage des réponse
				$i = 0;
				while($i < $nb_rep)
				{
					print_r($Reponse[$i]['intitule']);
					
					echo '<br>';
					$i++;
				}

				//foreach($Reponses as $Reponse)
				//{
				//	echo $Reponse['intitule'];
				//}
				//print_r($reponses);
				//print_r($Nbreponses);
			?>
			</td>
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