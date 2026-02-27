<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "estoque";

//conexão com o banco de dados

try {
    //tentativa com o banco de dados
    //codigo...
    //classe PDO é usada para acessar varios tipos de banco de dados usando a mesma função
    
    $conexao = new PDO("
    mysql:host=$servidor;
    dbname=$banco;
    charset=utf8",
    $usuario,
    $senha);

} catch (\Throwable $th) {
    //throw $th;
}