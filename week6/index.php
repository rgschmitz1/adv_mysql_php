<?php
require_once('Book.php');
require_once('CD.php');
require_once('DVD.php');
require_once('Toy.php');

//can't instantiate an instance of an interface

$book = new Book();
$cd = new CD();
$dvd = new DVD();
$toy = new Toy();

$products = array($book, $cd, $dvd, $toy);

foreach($products as $product) {
	$product->displayForSale();
	echo '<br />';
}
