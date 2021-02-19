<?php
    require_once '../Class/ConnQuery.php';
    require_once '../Class/ProdutoController.php';
    require_once '../Class/Tipo.php';
    include '../header.php';

    $tipo = new Tipo();
    $tipos = $tipo->listar($pdo);
?>

<h1 class="mt-3">Cadastrar Produto</h1>

<a href="./index.php" class="btn btn-info mt-3 mb-3"><i class="fab fa-product-hunt"></i> Todos Produtos</a>

<form action="" method="post">
    <div class="row">
        <div class="col-md-6 form-group">
            <label for="produto">Nome do produto <span class="text text-danger">*</span></label>
            <input type="text" name="produto" id="produto" class="form-control" autofocus maxlength="64" required>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3 form-group">
            <label for="valor">Valor <span class="text text-danger">*</span></label>
            <input type="text" name="valor" id="valor" class="form-control" required>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6 form-group">
            <label for="nome">Tipo <span class="text text-danger">*</span> </label><a href="../tipos_produtos/create.php" class="text text-success float-end"><i class="fas fa-plus-circle"></i> Cadastrar tipo do produto</a>
            <select name="tipo_id" id="tipo_id" class="form-control" required>
                <option value="">... selecione o tipo</option>
                <?php foreach($tipos as $t) : ?>
                    <option value="<?= $t->id_tipo ?>"><?= $t->tipo ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3 form-group">
        <button type="submit" name="cadastrar" class="btn btn-success"><i class="fas fa-check"></i> Cadastrar Produto</button>
        </div>
    </div>

</form>

<?php include '../footer.php'; ?>