<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/loja_crud.php';

$lojas = buscarLoja($conexao);

/*echo "<pre>";
var_dump($lojas);
echo "</pre>";*/

$titulo = "Lojas |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>

<section class="text-center mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3><i class="bi bi-tags-fill"></i> Lista de Lojas</h3>

    <?php
    if (isset($_GET['status'])) :
        $mensagem = "";
        $classe = "alert-success";

        switch ($_GET['status']) {
            case 'excluido':
                $mensagem = "Loja removida com sucesso!";
                $classe = "alert-danger"; // Vermelho para exclusão
                break;
            case 'atualizado':
                $mensagem = "Dados atualizados com sucesso!";
                break;
            case 'sucesso':
                $mensagem = "Nova loja cadastrada!";
                break;
        }
    ?>	

 <div class="alert <?= $classe ?> alert-dismissible fade show w-75 mx-auto mb-4" role="alert">
            <i class="bi bi-info-circle"></i> <?= $mensagem ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <p class="text-center my-4">
        <a href="inserir.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Adicionar Nova Loja</a>
    </p>

    <div class="table-responsive">
        <table class="table table-hover align-middle caption-top">
            <caption>Quantidade de registros:<?=  count($lojas) ?></caption>
            <thead class="align-middle table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($lojas as $lojas) : ?>
                    <tr>
                        <td><?= $lojas['id']?></td>
                        <td><?= $lojas['nome']?></td>
                        <td class="text-end">
                            <a class="btn btn-warning btn-sm" href="editar.php?id=<?= $lojas['id'] ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                        </td>
                        <td class="text-start">
                            <a class="btn btn-danger btn-sm" href="excluir.php?id=<?= $lojas['id'] ?>"><i class="bi bi-trash"></i> Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>