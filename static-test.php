<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once 'inc/routes.inc.php';
require_once 'inc/router.static.class.php';
$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/wifi/beauty-urls/";

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pretty URLs</title>
        <link rel="stylesheet" href="<?php echo $path; ?>css/pure-min.css">
        <link rel="stylesheet" href="<?php echo $path; ?>css/layout.css">
    </head>
    <body>
        <div class="wrapper">
            <header class="main-header">
                <h1>Pretty Urls- StaticClass</h1>
            </header>
            <main>
                <a href="<?php echo $path; ?>index.php">Index</a>
                <?php
//                echo $path;
                $validIncs = ['admin','wi-fi','wifi'];
//                var_dump($include);
                echo RouterStatic::getRoute($validIncs, 'inc', '.inc.php' );
                include RouterStatic::getRoute($validIncs, 'inc', '.inc.php' );
//                var_dump($_SERVER);
                ?>
            </main>
        </div>
    </body>
</html>