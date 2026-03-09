<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/src/produto_crud.php';
require_once BASE_PATH . '/src/fornecedor_crud.php';

$produtos = buscarProduto($conexao);

$fornecedores = buscarFornecedor($conexao);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = ($_POST['nome']);
    $descricao = ($_POST['descricao']);
    $preco = ($_POST['preco']);
    $quantidade = ($_POST['quantidade']);
    $fornecedor_id = ($_POST['fornecedor_id']);

    //echo $nome, $descricao, $preco, $quantidade, $fornecedor_id;

    if($nome && $descricao && $preco && $quantidade && $fornecedor_id){
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, fornecedor_id) VALUES (:nome, :descricao, :preco, :quantidade, :fornecedor_id)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':quantidade' => $quantidade,
            ':fornecedor_id' => $fornecedor_id
        ]);

        header('Location: listar.php?status=sucesso');
        exit;
    }else{
        echo "<div class='alert alert-danger'>Todos os campos são obrigatórios.</div>";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $peso = ($_POST['peso']);
    $dimensoes = ($_POST['dimensoes']);
    $codigo_barras = ($_POST['codigo_barras']);
    $data_validade = ($_POST['data_validade']);

    //echo $peso, $dimensoes, $codigo_barras, $data_validade, $produto_id;

    if($peso && $dimensoes && $codigo_barras && $data_validade && $produto_id){
        $sql = "INSERT INTO detalhe_produto (peso, dimensoes, codigo_barras, data_validade, produto_id) VALUES (:peso, :dimensoes, :codigo_barras, :data_validade, :produto_id)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':peso' => $peso,
            ':dimensoes' => $dimensoes,
            ':codigo_barras' => $codigo_barras,
            ':data_validade' => $data_validade,
        ]);

        header('Location: listar.php?status=sucesso');
        exit;
    }else{
        echo "<div class='alert alert-danger'>Todos os campos são obrigatórios.</div>";
    }
}

$titulo = "Adicionar Produto |";
require_once BASE_PATH . '/includes/cabecalho.php';
?>


<section class="mb-4 border rounded-3 p-4 border-primary-subtle">
    <h3 class="text-center"><i class="bi bi-plus-circle-fill"></i> Adicionar Produto</h3>



    <form method="post" class="w-75 mx-auto">
        <fieldset>
            <legend>Produto</legend>
            <div class="form-group mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="descricao">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="preco">Preço:</label>
                <input class="form-control" type="number" step="0.01" name="preco" id="preco">
            </div>


            <div class="form-group mb-3">
                <label class="form-label" for="quantidade">Quantidade:</label>
                <input class="form-control" type="number" name="quantidade" id="quantidade">
            </div>

            <div class="form-group mb-3">
                <label class="form-label" for="fornecedor_id">Fornecedor:</label>
                <select class="form-select" name="fornecedor_id" id="fornecedor_id">
                    <option value=""></option>
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <option value="<?= $fornecedor['id'] ?>"><?= $fornecedor['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </fieldset>

        <fieldset class="mt-4">
            <legend>Detalhes do Produto</legend>
            <div class="form-group mb-3">
                <label class="form-label" for="peso">Peso (kg):</label>
                <input class="form-control" type="number" step="0.01" name="peso" id="peso">
            </div>

            <div class="form-group mb-3">
                <label for="dimensoes">Dimensões:</label>
                <input class="form-control" type="text" name="dimensoes" id="dimensoes">
            </div>

            <div class="form-group mb-3">
                <label for="codigo_barras">Código de Barras:</label>
                <input class="form-control" type="text" name="codigo_barras" id="codigo_barras">
            </div>

            <div class="form-group mb-3">
                <label for="codigo_barras">Data de Validade:</label>
                <input class="form-control" type="date" name="data_validade" id="data_validade">
            </div>
        </fieldset>


        <button class="btn btn-success my-4" type="submit"><i class="bi bi-check-circle"></i> Salvar</button>
    </form>


</section>

<?php require_once BASE_PATH . '/includes/rodape.php'; ?>
