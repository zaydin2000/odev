<?php

$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
$usd_buying = $connect_web->Currency[0]->BanknoteBuying;
$usd_selling = $connect_web->Currency[0]->BanknoteSelling;
$euro_buying = $connect_web->Currency[3]->BanknoteBuying;
$euro_selling = $connect_web->Currency[3]->BanknoteSelling;


 
echo 'USD Alış: '.$usd_buying.'<br>USD Satış: '.$usd_selling.'<br>';
echo 'EUR Alış: '.$euro_buying.'<br>EUR Satış: '.$euro_selling;


?>