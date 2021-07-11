<?php

require_once('src/PrettyJson.php');

use MajorGrey\PrettyJson;

$arry = [ "name" => "majorgrey", 'email' => "chuksjimg@gmail.com", 'metadata' => ['color' => 'blue', 'food' => 'rice'] ];
$json = json_encode($arry);

$pjson = PrettyJson::prettyprint($json);
echo $pjson;