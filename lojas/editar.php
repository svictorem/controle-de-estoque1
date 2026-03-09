<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/loja_crud.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header("Location: listar.php");
    exit;
}

$loja = buscarLojaPorId($conexao, $id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = ($_POST['id']);
    $nome = ($_POST['nome']);

    if(editarLoja($conexao, $id, $nome)){
        header('Location: listar.php?status=atualizado');
        exit;
    }else{
        die("Erro ao tentar atualizar a loja");
    }

}

$titulo = "Editar Loja |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>
<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-pencil-fill"></i> Editar Loja</h3>


    <form method="post" class="w-75 mx-auto">
         <input type="hidden" name="id" value="<?= $loja['id'] ?>">
        <div class="form-group">
            <label for="nome" class="form-label">Nome da loja:</label>
            <input type="text" name="nome" class="form-control" value="<?= $loja['nome'] ?>">
        </div>
        <button class="btn btn-warning my-4" type="submit"><i class="bi bi-arrow-clockwise"></i> Salvar Alterações</button>
    </form>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>