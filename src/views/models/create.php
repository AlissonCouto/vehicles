<?php $this->layout('../_theme'); ?>

    <h2>Cadastro de modelo</h2>
    <form method="POST" action="<?= url("models/store"); ?>">
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control" id="model" name="description" value="<?= (isset($brand)) ? $brand->description : ''; ?>" placeholder="Digite o modelo">
        </div>
        <?php if (isset($messages['description'])) : ?>
            <small class="form-text text-danger"><?= $messages['description'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <label for="brand">Marca</label>
            <select class="form-control" id="brand" name="brand">
                <?php foreach ($brands as $brand) : ?>
                    <option <?= (isset($model) && $model->idBrand == $brand->id) ? 'selected' : ''; ?> value="<?= $brand->id; ?>"><?= $brand->description; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php if (isset($messages['brand'])) : ?>
            <small class="form-text text-danger"><?= $messages['brand'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>