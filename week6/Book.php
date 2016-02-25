<?php
require_once('Media.php');

class Book extends Media  {
//    private $author;
//    private $numberOfPages;
	//i have to provide implementation for these methods
	//because i implement IProductToSell
    public function getSupply() {
		echo "purchase books from barnes & noble";
	}
    public function deliverToCustomers() {
		echo "send a link to the .pdf file";
	}
    public function displayForSale() {
		echo "books for sale";
	}
}
