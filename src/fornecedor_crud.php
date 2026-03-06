<?php

function buscarFornecedor(PDO $conexao){
    
    $sql = "SELECT id, nome FROM fornecedores ORDER BY id";

    //$stmt
    //$queery

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function excluirFornecedor(PDO $conexao, $id){

    $sql = "DELETE FROM fornecedores WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);

    
    return $consulta->execute();
}

function buscarFornecedorPorId(PDO $conexao, $id){

    $sql = "SELECT * FROM fornecedores WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id);

    
    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
}

function editarFornecedor(PDO $conexao, $id, $nome){

    $sql = "UPDATE fornecedores SET nome = :nome WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->bindValue(':nome', $nome);

    
    return $consulta->execute();
}