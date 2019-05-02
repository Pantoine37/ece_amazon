<!DOCTYPE html>
<html lang="fr">

<!-- Header -->
<?php include("header.php");?>

<style>
	#block_form
	{
		display : block;
		width : 20rem;
		padding-left: 80px;

		
	}
	#button_form
	{
		padding-left: 120px;
		float:left;
		display : block;
	}
	.container-fluid
	{
		padding-left : 0px;
		padding-right : 0px;
	}
</style>

<div class="jumbotron">
		<div class="container">
		  <h1 class="display-3">Quelle catégorie d'item souhaitez-vous ajouter ?</h1>
		</div>
</div>

<body class="container-fluid">
	
	<div id="block_form" class="form-group">
		<FORM method="get" action="cible.php" >
			<SELECT name="choix"  id="selecteur" class="form-control">
				<option value ="livre">livre</option>
				<option value ="musique">musique</option>
				<option value ="vetement">vetement</option>
				<option value ="spo_act">Sport et Activité</option>
			</SELECT>
	</div>
	<div id="button_form">
		<p>
			<br>
			<input id="button" type="submit" name="submit" value="Valider" class="btn btn-primary btn-lg"><br>
		</p>
		</FORM>
	</div>
</body>

<!-- Footer -->
<?php include("footer.php");?>


</html>