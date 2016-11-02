<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// URL bereinigen
$url = str_replace('/wifi/beauty-urls/', '', $_SERVER['REQUEST_URI']);

$params = explode('/', $url);
//var_dump($params);
//echo $url.'<br>';


switch ($params[0]) {
    case 'admin':
    case 'default':
        $mainInclude = 'inc/' . $params[0] . '.inc.php';
        break;

    default:
        $mainInclude = 'inc/default.inc.php';
        break;
}