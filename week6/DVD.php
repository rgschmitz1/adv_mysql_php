<?php
require_once('Media.php');

class DVD extends Media  {
	//i have to provide implementation for these methods
	//because i implement IProductToSell
    public function getSupply() {
		echo "buy out supply from best buy";
	}
    public function deliverToCustomers() {
		echo "stream video";
	}
    public function displayForSale() {
		echo "post a craigslist ad";
	}
}
