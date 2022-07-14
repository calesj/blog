<?php 

spl_autoload_register(function (string $nomedoendereco){

$caminhodoArquivo = str_replace("PHPALURA", 'src',$nomedoendereco);
$caminhodoArquivo = str_replace("\\", DIRECTORY_SEPARATOR,$caminhodoArquivo);
$caminhodoArquivo .= ".php";

echo $caminhodoArquivo;

if(file_exists($caminhodoArquivo)){
    require_once($caminhodoArquivo);
}
});