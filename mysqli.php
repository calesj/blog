<?php
$mysql = new mysqli('Your Connection Here');
$mysql->set_charset('utf-8');

if($mysql == false){
    echo "erro de conexao";
}
?>