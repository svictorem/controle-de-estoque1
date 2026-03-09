<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/loja_crud.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header("Location: listar.php");
    exit;
}

$loja = buscarLojaPorId($conexao, $id);

if(isset($_GET['confirmar'])){
    if(excluirLoja($conexao, $id)){
        header('Location: listar.php?status=excluido');
        exit;
    }else{
        die("Erro ao tentar excluir a loja");
    }
}

$titulo = "Excluir Loja |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-trash3-fill"></i> Excluir Loja</h3>

    <div class="alert alert-danger w-50 text-center mx-auto">
        <p> Deseja realmente excluir esta loja?</p><b><?= $loja['nome'] ?></b>
        <p>Caso existam registros de estoque dela, <b>eles também serão excluídos!</b></p>

        <a href="listar.php" class="btn btn-secondary">Não</a>
        <a href="?id=<?= $id ?>&confirmar=true" class="btn btn-danger">Sim</a>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>