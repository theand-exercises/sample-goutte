<?php

require 'vendor/autoload.php';

use Goutte\Client;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\ErrorHandler;

use Carbon\Carbon;

// create a log channel
$log = new Logger('goutte');
$log->pushHandler(new RotatingFileHandler('./logs/goutte.log', 0, Logger::WARNING));

ErrorHandler::register($log);


$client = new Client();

$crawler = $client->request('GET',  'http://weather.media.daum.net/?pageId=103&metro=M100&area=11G00201');//제주 날씨

$crawler->filter("#Detail_wt .detail_dd .detail_left dl dd .dt2")->each( function(\Symfony\Component\DomCrawler\Crawler $node){
    echo trim($node->text())."\n";
});

$cr = $crawler->filter("#Detail_wt .detail_dd .detail_left dl dd .dt2");
echo trim($cr->text()) ."\n";

$log->addWarning('----');
$log->addWarning('Foo');
$log->addError('Bar');
$log->addInfo('this');
$log->addInfo('that');

throw new Exception('TEST');



