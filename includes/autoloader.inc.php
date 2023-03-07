<?php 
spl_autoload_register('autoLoader');
function autoLoader ($className){
    $path = "../classes/";
    $ext = ".php"; 
    $fullPath = $path . $className . $ext;

    if(!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
}

?>