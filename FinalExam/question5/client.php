<?php
require_once("vendor/autoload.php");
$client = new GuzzleHttp\Client();

$url = "http://matcservice.azurewebsites.net/api/Students";

$response = $client->request("DELETE", $url, ["form_params"=>["id"=>12]]);

echo $response->getBody();
