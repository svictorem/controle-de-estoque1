<?php

function buscarProduto(PDO $conexao){
    
   // Usamos apelidos (p para produtos, f para fornecedores) para facilitar
    $sql = "SELECT 
                p.id, 
                p.nome, 
                p.descricao, 
                p.preco, 
                p.quantidade, 
                p.fornecedor_id,
                f.nome AS nome_fornecedor
            FROM produtos AS p
            INNER JOIN fornecedores AS f ON p.fornecedor_id = f.id
            ORDER BY p.nome";

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function excluirProduto(PDO $conexao, $id){

    $sql = "DELETE FROM produtos WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);

    
    return $consulta->execute();
}

function buscarProdutoPorId(PDO $conexao, $id){

    $sql = "SELECT * FROM produtos WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id);

    
    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
}

function editarProduto(PDO $conexao, $id, $nome, $descricao, $preco, $quantidade, $fornecedor_id){

    $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, fornecedor_id = :fornecedor_id
    WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->bindValue(':nome', $nome);
    $consulta->bindValue(':descricao', $descricao);
    $consulta->bindValue(':preco', $preco);
    $consulta->bindValue(':quantidade', $quantidade);
    $consulta->bindValue(':fornecedor_id', $fornecedor_id);
   
    return $consulta->execute();
}

function buscarDetalhesProduto(PDO $conexao){
    
    $sql = "SELECT id, peso, dimensoes, codigo_barras, data_validade, produto_id
    FROM detalhes_produto ORDER BY id";

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function excluirDetalhesProduto(PDO $conexao, $id){

    $sql = "DELETE FROM detalhe_produto WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);

    
    return $consulta->execute();
}

function buscarDetalhesProdutoPorId(PDO $conexao, $id){

    $sql = "SELECT * FROM detalhe_produto WHERE id = :id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id);

    
    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
}

function editarDetalhesProduto(PDO $conexao, $id, $peso, $dimensoes, $codigo_barras, $data_validade, $produto_id){

    $sql = "UPDATE detalhe_produto SET peso = :peso, dimensoes = :dimensoes, codigo_barras = :codigo_barras, data_validade = :data_validade, produto_id = :produto_id
    WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->bindValue(':peso', $peso);
    $consulta->bindValue(':dimensoes', $dimensoes);
    $consulta->bindValue(':codigo_barras', $codigo_barras);
    $consulta->bindValue(':data_validade', $data_validade);
    $consulta->bindValue(':produto_id', $produto_id);
   
    return $consulta->execute();
}