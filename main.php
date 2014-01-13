<?php

require 'vendor/autoload.php';

use Goutte\Client;

$connector = PhpConsole\Connector::getInstance();

$client = new Client();

$crawler = $client->request('GET',  'http://www.symfony-project.org/');

$link = $crawler->filter(".list_submenu li");

var_dump( $link);

