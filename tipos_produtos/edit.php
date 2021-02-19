<?php
    require_once '../Class/TipoController.php';
    include '../header.php';
?>
<h1 class="mt-3">Editar Tipo</h1>

<a href="./index.php" class="btn btn-info mt-3 mb-3"> Todos Tipos</a>

<form action="" method="post">

    <?php include '_form.php' ?>

    <div class="row mt-4">
        <div class="col-md-3 form-group">
            <button type="submit" class="btn btn-primary" name="alterar"><i class="fas fa-check"></i> Alterar</button>
        </div>
    </div>

</form>

<?php include '../footer.php'; ?>