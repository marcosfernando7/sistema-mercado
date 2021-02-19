<?php
    $tipo       = isset($editar->tipo) ? $editar->tipo : '';
    $imposto    = isset($editar->imposto) ? $editar->imposto : '';
    $id         = isset($_GET['id']) ? $_GET['id'] : '';
?>

<input type="hidden" name="id" id="id" value="<?= $id ?>">

<div class="row">
    <div class="col-md-6 form-group">
        <label for="tipo">Tipo de produto <span class="text text-danger">*</span></label>
        <input type="text" name="tipo" id="tipo" class="form-control" value="<?= $tipo ?>" autofocus maxlength="64" required>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-3 form-group">
        <label for="imposto">Valor do imposto em % <span class="text text-danger">*</span></label>
        <input type="text" name="imposto" id="imposto" class="form-control" value="<?= $imposto ?>" maxlength="10" required>
    </div>
</div>
