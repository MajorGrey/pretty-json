<?php

require_once('src/PrettyJson.php');

use MajorGrey\PrettyJson;

$array = array(
     "name" => "majorgrey", 
     'email' => "chuksjimg@gmail.com", 
     'metadata' => array (
         'color' => 'blue', 
         'food' => 'rice'
     ) 
);
$json = json_encode($array);

$pretty_json = PrettyJson::print($json);
echo $pretty_json;