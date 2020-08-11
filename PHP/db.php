<?php
$dsn = "mysql:dbname=login;charset=utf8";
$user = "root";
$pass = "";
try{
$cn = new PDO($dsn, $user, $pass);
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo "Error de conexión: " . $e->getMessage(); }
