<?php
use GuzzleHttp\Client;

$client = new Client();
$response = $client->request('GET', 'http://localhost:5000/api-endpoint');
$data = json_decode($response->getBody(), true);
