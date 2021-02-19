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

    <?php include '_form.php' ?>

    <div class="row mt-4">
        <div class="col-md-3 form-group">
        <button type="submit" name="alterar" class="btn btn-primary"><i class="fas fa-check"></i> Alterar Produto</button>
        </div>
    </div>

</form>

<?php include '../footer.php'; ?>