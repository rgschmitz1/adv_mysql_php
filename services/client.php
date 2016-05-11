<?php
require_once("vendor/autoload.php");
$client = new GuzzleHttp\Client();

// Read & post
$url = "http://rgschmitz1.mooo.com/services/studentService.php";
// Read by ID
//$url = "http://rgschmitz1.mooo.com/services/studentService.php?id=2";
//$url = "http://matcservice.azurewebsites.net/api/matc/1";
// http - GET request
$response = $client->request("GET", $url);

//$response = $client->request("POST", $url, ["form_params"=>["name"=>"joe blow", "email"=>"joe@gmail.com"]]);

//$response = $client->request("DELETE", $url, ["form_params"=>["id"=>2]]);
//$response = $client->request("DELETE", $url, ["json"=>["id"=>2]]);

//$response = $client->request("PUT", $url, ["form_params"=>["id"=>3, "name"=>"joe blow", "email"=>"joe@gmail.com"]]);

echo $response->getBody();
