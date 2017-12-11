<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Dec-17
 * Time: 11:56 PM
 */

$url="https://api.blockchain.info/charts/avg-block-size?daysAverageString=7&format=json";
$json=file_get_contents($url);
$json_data=json_decode($json,true);

echo $json_data['status'];
//foreach ($json_data as $item){
//    echo  $item->values;
//}