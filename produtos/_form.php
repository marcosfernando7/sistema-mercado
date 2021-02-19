<?php
    $produto    = isset($editar->produto) ? $editar->produto : '';
    $valor      = isset($editar->valor) ? $editar->valor : '';
    $id         = isset($_GET['id']) ? $_GET['id'] : '';
?>

<input type="hidden" name="id" id="id" value="<?= $id ?>">

<div class="row">
    <div class="col-md-6 form-group">
        <label for="produto">Nome do produto <span class="text text-danger">*</span></label>
        <input type="text" name="produto" id="produto" class="form-control" autofocus maxlength="64" value="<?= $produto ?>" required>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-3 form-group">
        <label for="valor">Valor <span class="text text-danger">*</span></label>
        <input type="text" name="valor" id="valor" class="form-control" required value="<?= $valor ?>">
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 form-group">
        <label for="nome">Tipo <span class="text text-danger">*</span> </label><a href="../tipos_produtos/create.php" class="text text-success float-end"><i class="fas fa-plus-circle"></i> Cadastrar tipo do produto</a>
        <select name="tipo_id" id="tipo_id" class="form-control" required>
            <option value="">... selecione o tipo</option>
            <?php foreach($tipos as $t) :
                if($t->id_tipo == $editar->id_tipo) :
                    $selected = 'selected';
                else : 
                    $selected = '';
                endif;
                ?>
                <option value="<?= $t->id_tipo ?>" <?= $selected ?>><?= $t->tipo ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>