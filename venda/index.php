<?php
    require_once '../Class/ConnQuery.php';
    require_once '../Class/Produto.php';
    require_once '../Class/Venda.php';
    require_once '../Class/VendaController.php';

    $listar = new Produto();
    $list = $listar->listar($pdo);

    $venda_realizada = new Venda();
    $vendas = $venda_realizada->vendas_realizadas($pdo);

    $total = new Venda();
    $total = $total->totalizador($pdo);

    include '../header.php';
?>


<h1 class="mt-3">Venda de Produtos</h1>

<table class="table table-hover table-striped" id="myTable">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Valor unitário</th>
            <th>Tipo</th>
            <th>Quantidade</th>
            <th><i class="fas fa-dollar-sign"></i> Realizar venda</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($list as $l) : ?>
        <tr>
            <td><?= $l->produto ?></td>
            <td>R$ <span id="valor_unitario"><?= $l->valor ?></span></td>
            <td><?= $l->tipo ?></td>
            <form action="" method="post">
                <td>
                    <input type="hidden" id="id_produto" name="id_produto" value="<?= $l->id_produto ?>">
                    <div class="col-md-12">
                        <input type="number" min="1" max="100" value="1" name="valor_quantidade" class="quantidade form-control" required>
                    </div>
                </td>
                <td>
                    <div class="col-md-12">
                        <button type="submit" name="realizar_venda" class="btn btn-info"><i class="fas fa-dollar-sign"></i> realizar venda</button>
                    </div>
                </td>
            </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<h1 class="mt-4">Vendas Realizadas</h1>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor dos produto (total por quantidade de cada item)</th>
            <th>Valor do imposto de cada item</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($vendas as $v) : ?>
            <tr>
                <td><?= $v->produto ?></td>
                <td><?= $v->quantidade ?></td>
                <td>R$ <?= $v->valor_quantidade ?></td>
                <td>R$ <?= $v->valor_imposto ?></td>
            </tr>
        <?php endforeach; ?>

            <tr>
                <th>#</th>
                <th>Quantidade total</th>
                <th>Valor de compa (total)</th>
                <th>Valor dos impostos (total)</th>
            </tr>

            <tr>
                <th>Total</th>
                <td><?= $total->qt ?></td>
                <td>R$ <?= $total->vq ?></td>
                <td>R$ <?= $total->vi ?></td>
            </tr>
    </tbody>


</table>

<script src="../assets/js/app-table.js"></script>

<?php include '../footer.php'; ?>