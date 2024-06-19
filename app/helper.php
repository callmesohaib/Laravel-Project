<?php
//important functions
// echo "Help";
if (!function_exists('p')) {
    function p($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}
if (!function_exists('get_format_date')) {
    function get_format_date($date, $format)
    {
        $formatedDate = date($format, strtotime($date));
        return $formatedDate;
    }
}

