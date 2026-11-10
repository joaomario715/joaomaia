<?php 

//$host = 'localhost';
$host = 'localhost';
$db = 'joaom755_db1';
$user = 'joaom755';
$pass = '755!@#';
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;
    charset=$charset",
    $user,
    $pass 
 );

 $pdo -> setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
 );

 echo "BANCO DE DADOS CONECTADO COM SUCESSO\n";

} catch (PDOException $e){
    echo "ERRO AO CONECTAR BANCO DE DADOS:\n";
    echo $e -> getMessage();
}
?>