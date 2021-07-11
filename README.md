# pretty-json

JSON pretty print for PHP

## Installation

This project using composer.

```
composer require majorgrey/pretty_json
```

## Usage

JSON pretty print.

```php
<?php

use MajorGrey\PrettyJson;

$array = array(
     "name" => "majorgrey",
     'email' => "chuksjimg@gmail.com",
     'metadata' => array (
         'color' => 'blue',
         'food' => 'chicken'
     )
);
$json = json_encode($array);

$pretty_json = PrettyJson::print($json);
echo $pretty_json;
```
