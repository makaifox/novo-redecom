<?php

$dbname = 'redecompmm';
$host = 'redecompmm.mysql.dbaas.com.br';
$user = 'redecompmm';
$pass = 'pmmredecom2020';

try {
    $pdo = new PDO("mysql:dbname={$dbname};host={$host}",$user,$pass);
} catch(Exception $e) {
    echo "ERRO: ".$e->getMessage();
}