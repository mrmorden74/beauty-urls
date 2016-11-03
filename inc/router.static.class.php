<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RouterStatic {

        
    public static function getRoute(array $validIncs, string $includesFolder, string $fileExt) :string {
        
        if (!is_array($validIncs)) {
            exit('Bitte ein Array von gültigen includes mitgeben!');
        }
		 $validIncs_ =       $validIncs;
		 $includesFolder_ =  self::handleSlashes($includesFolder);
		 $fileExt_ =    self::handleSlashes($fileExt);
       
        $url = self::cleanUrl();
        
        $params = explode('/', $url);
        if (!in_array($params[0], $validIncs_)) {
             
            $incFile = 'default';
        }   else {
            $incFile = $params[0];
        }
        return $includesFolder_ .'/'. $incFile . $fileExt_;
        
    }
    private static function handleSlashes(string $path) {
        return trim($path,'/\\');
    }
    private static function cleanUrl() {
        $params_root = explode('/', $_SERVER['SCRIPT_NAME']);
        $url = $_SERVER['REQUEST_URI'];
        foreach ($params_root AS $param_root) {
            $replace = $param_root;
            $url = str_replace($replace, '', $url);
        }
        return trim($url, '/');
    }
}
