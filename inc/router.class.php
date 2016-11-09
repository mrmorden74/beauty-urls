<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Router {
    	private $validIncs = [];
	private $includesFolder = 'inc';
	private $fileExt = '.inc.php';
        
    public function __construct(array $validIncs, string $includesFolder, string $fileExt) {
        if (!is_array($validIncs)) {
            exit('Bitte ein Array von gültigen includes mitgeben!');
        }
		 $this->validIncs =       $validIncs;
		 $this->includesFolder =  $this->handleSlashes($includesFolder);
		 $this->fileExt =         $this->handleSlashes($fileExt);
    }    
    public function getRoute() :string {
        
        $url = $this->cleanUrl();
        
        $params = explode('/', $url);
        if (!in_array($params[0], $this->validIncs)) {
             
            $incFile = 'default';
        }   else {
            $incFile = $params[0];
        }
        return $this->includesFolder .'/'. $incFile . $this->fileExt;
        
    }
    private function handleSlashes(string $path) {
        return trim($path,'/\\');
    }
    private function cleanUrl() {
            // var_dump($_SERVER);
        $params_root = explode('/', $_SERVER['SCRIPT_NAME']);
        $url = $_SERVER['REQUEST_URI'];
        foreach ($params_root AS $param_root) {
            $replace = $param_root;
            $url = str_replace($replace, '', $url);
        }
        return trim($url, '/');
    }
    public function getKeyValue($label) {
        //   var_dump($_SERVER);
        $url = $_SERVER['REQUEST_URI'];
        $params = explode('/', $url);
        foreach ($params AS $key => $param) {
            if($param == $label) return $params[$key+1];
        }
    }
}
