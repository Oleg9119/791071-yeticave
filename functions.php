<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function format_cost($cost) {
    $round = ceil($cost);
    return number_format($round, 0, '', ' ') . ' ₽';
}

function config($key = null) {
    $config = require_once('config.php');

    if (is_null($key)) {
        return $config;
    }

    if (isset($config[$key])) {
        return $config[$key];      
    }
}
?>