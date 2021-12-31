<?php $this->layout('../_theme'); ?>

    <h2>Cadastro de marca</h2>
    <form method="POST" action="<?= url("brands/store"); ?>">
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" id="brand" name="description" value="<?= (isset($brand)) ? $brand->description : ''; ?>" placeholder="Digite a marca">
        </div>
        <?php if (isset($messages['description'])) : ?>
            <small class="form-text text-danger"><?= $messages['description'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>