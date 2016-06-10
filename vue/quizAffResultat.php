<?php include("entete2.php"); ?>
<title>Espace membre</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<br>
	<table>
		<caption>Liste des Quiz disponible</caption>
	    <?php
		foreach($lquizs as $lquiz)
		{
		?>
		<div class="Lquiz">
		        	<tr class="Lquiz">
		        		<td><?php echo $lquiz['titre']; ?></td>
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