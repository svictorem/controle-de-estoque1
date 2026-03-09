<?php

function buscarLoja(PDO $conexao){
    
    $sql = "SELECT id, nome FROM lojas ORDER BY id";

    //$stmt
    //$queery

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function excluirLoja(PDO $conexao, $id){

    $sql = "DELETE FROM lojas WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);

    
    return $consulta->execute();
}

function buscarLojaPorId(PDO $conexao, $id){

    $sql = "SELECT * FROM lojas WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id);

    
    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
}

function editarLoja(PDO $conexao, $id, $nome, $email, $senha){

    $sql = "UPDATE lojas SET nome = :nome WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->bindValue(':nome', $nome);

    return $consulta->execute();
}