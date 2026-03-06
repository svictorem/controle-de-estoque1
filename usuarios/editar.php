<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/usuario_crud.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header("Location: listar.php");
    exit;
}

$usuario = buscarUsuarioPorId($conexao, $id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = ($_POST['id']);
    $nome = ($_POST['nome']);
    $email = ($_POST['email']);
    $senha = ($_POST['senha']);

    if(editarUsuario($conexao, $id, $nome, $email, $senha)){
        header('Location: listar.php?status=atualizado');
        exit;
    }else{
        die("Erro ao tentar atualizar o usuario");
    }

}

$titulo = "Editar Usuário |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-pencil-fill"></i> Editar Usuário</h3>



    <form method="post" class="w-75 mx-auto">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <div class="form-group">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $usuario['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $usuario['email'] ?>">
        </div>
        <div class="form-group">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="Preencha apenas se for alterar">
        </div>
        <button class="btn btn-warning my-4" type="submit"><i class="bi bi-arrow-clockwise"></i> Salvar Alterações</button>
    </form>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>