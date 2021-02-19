<?php
    require_once '../Class/ConnQuery.php';
    require_once '../Class/Produto.php';
    require_once '../Class/ProdutoController.php';

    $listar = new Produto();
    $list = $listar->listar($pdo);

    include '../header.php';
?>


<h1 class="mt-3">Produtos</h1>

<a href="./create.php" class="btn btn-info mt-3 mb-3"><i class="fas fa-plus-circle"></i> Cadastrar Produto</a>

<table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Valor R$</th>
            <th>Tipo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($list as $l) : ?>
        <tr>
            <td><?= $l->produto ?></td>
            <td>R$ <?= $l->valor ?></td>
            <td><?= $l->tipo ?></td>
            <td><a href="edit.php?id=<?= $l->id_produto ?>" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $l->id_produto ?>">
                    <button trype="submit" name="deletar" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="../assets/js/app-table.js"></script>

<?php include '../footer.php'; ?>