<?php

/**
 * MajorGrey PrettyJson
 * 
 * https://github.com/MajorGrey/pretty-json
 * Version 1.0
 * 
 * Copyright 2021, Chuks Okwuenu
 * Released under the MIT license
 */

namespace MajorGrey;
 
class PrettyJson
{

    public static function print($json, $json_attribute_color = '#000', $value_attribute_color = '#0B7500')
    {
        $output = self::loop_json($json, $json_attribute_color, $value_attribute_color);
        $pretty_json = stripcslashes($output);
        return $pretty_json;
    }

    private static function loop_json($json,  $json_attribute_color, $value_attribute_color)
    {
        $space = 0;
        $flag = false;
        
        $data =  "<pre>";

        //loop for iterating the full json data
        for ($counter=0; $counter<strlen($json); $counter++) {

            //Checking ending second and third brackets
            if ($json[$counter] == '}' || $json[$counter] == ']') {
                $space--;
                $data .=  "\n";
                $data .=  str_repeat(' ', ($space*2));
            }

            //Checking for double quote(“) and comma (,)
            if ($json[$counter] == '"' && ($json[$counter-1] == ',' ||
            $json[$counter-2] == ',')) {
                $data .=  "\n";
                $data .=  str_repeat(' ', ($space*2));
            }
            
            if ($json[$counter] == '"' && !$flag) {
                if ($json[$counter-1] == ':' || $json[$counter-2] == ':') {

                    //Add formatting for question and answer
                    $data .=  "<span style='color:$value_attribute_color'>";
                } else {

                    //Add formatting for answer options
                    $data .=  "<span style='color:$json_attribute_color;'>";
                }
            }

            $data .=  $json[$counter];
            //Checking conditions for adding closing span tag
            if ($json[$counter] == '"' && $flag) {
                $data .=  '</span>';
            }
            
            if ($json[$counter] == '"') {
                $flag = !$flag;
            }

            //Checking starting second and third brackets
            if ($json[$counter] == '{' || $json[$counter] == '[') {
                $space++;
                $data .=  "\n";
                $data .=  str_repeat(' ', ($space*2));
            }
        }
        $data .=  "</pre>";

        return $data;
    }
}