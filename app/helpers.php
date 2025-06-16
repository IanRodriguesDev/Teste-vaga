<?php

//Envolvendo as funções para evitar duplicidades

if (!function_exists('layout')) {
function layout()
{
    return \Request::is('admin/*') ? 'layouts.admin' : 'layouts.app';
}
}

if (!function_exists('isAdmin')) {
function isAdmin()
{
    return \Request::is('admin/*') ? true : false;
}
}

if (!function_exists('encodeBase64')) {
function encodeBase64($texto)
{
    return isset($texto) ? base64_encode($texto) : null;
}
}

if (!function_exists('decodeBase64')) {
function decodeBase64($texto)
{
    return isset($texto) ? base64_decode($texto) : null;
}
}

if (!function_exists('mask')) {
function mask(String $mask, String $str) {
    $str = str_replace(" ","",$str);

    for($i=0; $i<strlen($str); $i++)
        $mask[strpos($mask,"#")] = $str[$i];

    return $mask;
}
}

if (!function_exists('mask_cpf')) {
function mask_cpf(String $str) {
    return mask("###.###.###-##", $str);
}
}
