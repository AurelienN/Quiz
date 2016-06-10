<?php include("entete2.php"); ?>
<title>Espace membre</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<br>
	<table>
		<caption>Vos résultats aux Quiz.</caption>
		<tr>
			<th class="quiz">Titre</th>
			<th class="quiz">Score</th>
		</tr>
	    <?php
		foreach($quizs as $quiz)
		{
		?>
		
	    	<tr class="quiz">
	    		<td class="quiz"><?php echo $quiz['titre']; ?></td>
		        <td class="quiz"><?php echo $quiz['Score']; ?>%</td>
	        </tr>
		<?php
		}
		?>
	</table>
	<br>
<!-- <a href="deconnexion.php">Déconnexion</a> -->
</body>
</html>