<?php
//class Book {
//    //id, title, author, price, description, pages
//}
//class DVD {
//    //id, title, director, price, description, length, genre
//}
//class CD extends Media {
//}

interface IProductToSell {
    //no implementation {}
    public function getSupply();
    public function deliverToCustomers();
    public function displayForSale();
}
