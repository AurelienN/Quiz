<?php include("entete2.php"); ?>
<title>Espace membre</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<br>
	<table>
		<caption>Vos résultats aux Quiz.</caption>
		<tr>
			<th>Titre</th>
			<th>Score</th>
		</tr>
	    <?php
		foreach($quizs as $quiz)
		{
		?>
		<div class="quiz">
		        	<tr>
		        		<td><?php echo $quiz['titre']; ?></td>
				        <td><?php echo $quiz['Score']; ?>%</td>
			        </tr>
		</div>
		<?php
		}
		?>
	</table>
	<br>
<!-- <a href="deconnexion.php">Déconnexion</a> -->
</body>
</html>