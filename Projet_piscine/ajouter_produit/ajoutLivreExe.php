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


$req = $bdd->prepare('INSERT INTO items(name,price, shape, videoLink, description, quantity,seller) VALUES(:name,:price, :shape, :videoLink, :description, :quantity,:seller)');
$req->execute(array(
	'name' => $_POST['name'],
	'shape' => $_POST['shape'],
	'videoLink' => $_POST['videoLink'],
	'description' => $_POST['description'],
	'price' => $_POST['price'],
	'quantity' => $_POST['quantity'],
	'seller'=>'theo.mercier@edu.ece.fr'
	));

//recuperer l'id du dernier truc inseré
$idbook=0;


$reponse = $bdd->query('SELECT MAX(id) as id FROM items');	


while ($donnees = $reponse->fetch())
{
	$idbook=$donnees['id'];
}

$req1 = $bdd->prepare('INSERT INTO books(id_item, author, editor, nbPage, size, bLanguage, releaseDate,category) VALUES(:id_item,:author, :editor, :nbPage, :size, :bLanguage, :releaseDate,:category)');
$req1->execute(array(
	'id_item' => $idbook,
	'author' => $_POST['author'],
	'editor' => $_POST['editor'],
	'nbPage' => $_POST['nbPage'],
	'size' => $_POST['size'],
	'bLanguage' => $_POST['langue'],
	'releaseDate' => $_POST['reDate'],
	'category' => $_POST['category']

	));

	$reponse->closeCursor();

?>