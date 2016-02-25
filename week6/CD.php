<?php
require_once('Media.php');

class CD extends Media  {
	//i have to provide implementation for these methods
	//because i implement IProductToSell
    public function getSupply() {
		echo "best buy and buy blank cd-r";
	}
    public function deliverToCustomers() {
		echo "go to ITunes";
	}
    public function displayForSale() {
		echo "purchase CD on ITunes";
	}
}
