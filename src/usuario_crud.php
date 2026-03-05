<?php

function buscarUsuario(PDO $conexao){
    
    $sql = "SELECT id, nome, email FROM usuarios ORDER BY id";

    //$stmt
    //$queery

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function excluirUsuario(PDO $conexao, $id){

    $sql = "DELETE FROM usuarios WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);

    
    return $consulta->execute();
}

function buscarUsuarioPorId(PDO $conexao, $id){

    $sql = "SELECT * FROM usuarios WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);

    
    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
}