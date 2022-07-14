<?php


function redirecionar(String $url): void
{
    header("Location: $url");
    die();
}



