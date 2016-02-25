<?php
require_once('invoiceitem.php');
// below is untested
class Invoice {
	$items[]; // invoiceItem
	$total;

	private function calculateInvoice() {
		//calculate the total cost of all InvoiceItem (i.e. set $total)
	}

	public function displayInvoice() {
		//loop through each of the invoiceItems and display them
		//print the total (call calculateInvoice)
	}
}
