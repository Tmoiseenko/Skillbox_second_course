<?php

function array_get($array, $key, $default = null){
    $output = $array;
    $keys = explode('.', $key);
    foreach ($keys as $key){
        if (array_key_exists($key, $output)){
            $output = $output[$key];
        } else {
          return $default;
        }
    }
    return $output;
}

function includeLayout(string $template, $data = []){
    extract($data);
    require VIEW_DIR . '/layout/' . str_replace('.', '/', $template) . '.php';
}