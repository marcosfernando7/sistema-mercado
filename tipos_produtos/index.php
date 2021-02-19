<?php
include '../header.php';
require '../Class/ConnQuery.php';
require '../Class/Tipo.php';
require '../Class/TipoController.php';

// lista todos os tipos
$tipo = new Tipo();
$tipos = $tipo->listar($pdo);

?>
<h1 class="mt-3">Tipos</h1>

<a href="./create.php" class="btn btn-info mt-3 mb-3"><i class="fas fa-plus-circle"></i> Cadastrar Tipo</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Data cadastro</th>
            <th>Tipos</th>
            <th>Valor % do Imposto</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($tipos as $t) : ?>
        <tr>
            <td><small><?= $t->data_cadastro ?></small></td>
            <td><?= $t->tipo ?></td>
            <td><?= $t->imposto ?>%</td>
            <td><a href="edit.php?id=<?= $t->id_tipo ?>" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a></td>

            <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $t->id_tipo ?>">
                <button trype="submit" name="deletar" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include '../footer.php'; ?>