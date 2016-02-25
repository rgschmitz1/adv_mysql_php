<?php
require_once('Media.php');

class Toy extends Media  {
	//i have to provide implementation for these methods
	//because i implement IProductToSell
    public function getSupply() {
		echo "steal toys from neighborhood kids";
	}
    public function deliverToCustomers() {
		echo "send with Santa Claus";
	}
    public function displayForSale() {
		echo "market to parents";
	}
}
