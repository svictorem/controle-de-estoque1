<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/usuario_crud.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header("Location: listar.php");
    exit;
}

$usuario = buscarUsuarioPorId($conexao, $id);

if(isset($_GET['confirmar'])){
    if(excluirUsuario($conexao, $id)){
        header('Location: listar.php?status=excluido');
        exit;
    }else{
        die("Erro ao tentar excluir o usuario");
    }
}

$titulo = "Excluir Usuário |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-trash3-fill"></i> Excluir Usuário</h3>

    <div class="alert alert-danger w-50 text-center mx-auto">
        <p>Deseja realmente excluir o usuário <b><?=  $usuario['nome'] ?></b>?</p>
        <a href="listar.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Não</a>
        <a href="?id=<?= $id ?>&confirmar=true" class="btn btn-danger"><i class="bi bi-check-circle"></i> Sim</a>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>