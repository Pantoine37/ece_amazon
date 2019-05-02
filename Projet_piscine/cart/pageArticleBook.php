<!DOCTYPE html>
<!--
	Auteurs : Clément LARIVIERE	TD10
			  Théo MERCIER		TD04
			  Antoine PAINCHAUX TD01
-->
<html lang="fr">

<?php include("header.php");?>

<?php session_start(); ?>

<style type="text/css">
	#pageArticle
	{
		display: block;
	}

	#info
	{
		display: block;
		float:right;
		width:600px;
		padding: 50px;
		border: thick double grey;
		margin: 50px;
		background-color: #e9ecef;
	}

	#pict
	{
		display: block;
		float:left;
		width:30em;
		padding-left: 3em;
		padding-top: 0.2em;
	}
	#partiePhoto
	{
		display: block;
		padding:auto;
		background-color: #e9ecef;
		border: thick double grey;
	}
	#photo
	{	
		display: block;
		margin-right:auto;
		margin-left:auto;
		padding-top: 1em;
		padding-bottom: 1em;
	}
	#block_bouton
	{
		display:block;
		bottom : 0;
	}
	#bouton_retour
	{
    	margin:1em;
	}
</style>


<main role="main">


	<!-- A LIRE !!!!!!!!! https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-lisez-des-donnees -->



			<?php

				$database = "ece_amazon";

				try
				{
				  $bdd = new PDO('mysql:host=localhost;dbname=ece_amazon;charset=utf8', 'root', 'root');
				}
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
				  
				$reponse = $bdd->query('SELECT * FROM items INNER JOIN books ON items.id=books.id_item WHERE id=1');
				$photoIt = $bdd->query('SELECT * FROM items INNER JOIN photoLinks ON items.id=photoLinks.id_item WHERE id=1');

				while ($dataPic = $photoIt->fetch())
				{
					$photoDeItem = $dataPic['photoLink'];
				}

				while ($donnees = $reponse->fetch())
				{
			?>

				<div id="pageArticle">

						<div id="bouton_retour" class = "container">
							<a class="btn btn-link" id="bouton_retour" href="../categorie/livres.php" role="button"><< Retour</a>
						</div>


					<div id="pict">


						<h1><?php echo $donnees['name']; ?></h1>
						<h4><?php echo $donnees['author']; ?></h4><br>
						<div id="partiePhoto">
							<input id="photo" type="image" src='../photoPiscine/Livre/<?php echo $photoDeItem; ?>' height='500em' width=auto>
						</div>

					</div>
						
					

					<div id="info">

						<tr>
						<td><h3>Information vente :</h3></td>
						</tr>

						<table>

						<tr>
						<td>Prix :</td>
						<td><?php echo $donnees['price']; echo "€"?></td>
						</tr>

					
						<tr>
						<td>Etat :</td>
						<td><?php echo $donnees['shape']; ?></td>
						</tr>

						<tr>
						<td>Stock :</td>
						<td><?php echo $donnees['quantity']; ?></td>
						</tr>

						</table>

						Vendu par <?php echo $donnees['seller']; ?><br>

						<br><h3>Information du livre :</h3>

						<table>

						<tr>
						<td>Auteur du livre :</td>
						<td><?php echo $donnees['author']; ?></td>
						</tr>

						<tr>
						<td>Editeur du livre :</td>
						<td><?php echo $donnees['editor']; ?></td>
						</tr>

						<tr>
						<td>Nombre de page :</td>
						<td><?php echo $donnees['nbPage']; ?></td>
						</tr>

						<tr>
						<td>Genre :</td>
						<td><?php echo $donnees['category']; ?></td>
						</tr>

						<tr>
						<td>Format :</td>
						<td><?php echo $donnees['size']; ?></td>
						</tr>

						<tr>
						<td>Langue :</td>
						<td><?php echo $donnees['bLanguage']; ?></td>
						</tr>

						<tr>
						<td>Date de parution :</td>
						<td><?php echo $donnees['releaseDate']; ?></td>
						</tr>

						</table>
						<br><br>
						<?php echo $donnees['description']; ?>
						<br><br>

						<table>
							<tr>
								<td><a href=<?php echo $donnees['videoLink']; ?>>Lien Youtube</a><br><br></td>	
							</tr>
						</table>

						<div id="block_bouton" class = "container">
							<a class="btn btn-warning" id="bouton_ajout" href="../cart/loginBuyer.php?id=<?php echo $donnees['id'] ?>" role="button">Ajouter au panier &raquo;</a>
						</div>

					</div>
					
				</div>		
			
				

			<?php
				}

				$reponse->closeCursor(); // Termine le traitement de la requête

			?>
</main>

</html>
