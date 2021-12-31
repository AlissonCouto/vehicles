<?php $this->layout('../_theme'); ?>

<h2>Cadastro de veículo</h2>
<form method="POST" action="<?= url("store"); ?>">
    <div class="form-group">
        <label for="chassis">Nº chassi</label>
        <input type="text" class="form-control" id="chassis" name="chassis" value="<?= (isset($vehicle)) ? $vehicle->chassis : ''; ?>" placeholder="O nº do chassi">
    </div>
    <?php if (isset($messages['chassis'])) : ?>
        <small class="form-text text-danger"><?= $messages['chassis'][0]; ?></small>
    <?php endif; ?>

    <div class="form-group">
        <label for="plate">Placa</label>
        <input type="text" class="form-control" id="plate" name="plate" value="<?= (isset($vehicle)) ? $vehicle->plate : ''; ?>" placeholder="A placa">
    </div>
    <?php if (isset($messages['plate'])) : ?>
        <small class="form-text text-danger"><?= $messages['plate'][0]; ?></small>
    <?php endif; ?>

    <div class="form-group">
        <label for="year">Ano</label>
        <input type="text" class="form-control" id="year" name="year" value="<?= (isset($vehicle)) ? $vehicle->year : ''; ?>" placeholder="O ano do veículo">
    </div>
    <?php if (isset($messages['year'])) : ?>
        <small class="form-text text-danger"><?= $messages['year'][0]; ?></small>
    <?php endif; ?>

    <div class="form-group">
        <span>Categorias</span>
        <div class="d-flex">
            <?php foreach ($categories as $category) : ?>
                <div style="margin-right: 12px;">
                    <label for="<?= $category->id; ?>"><?= $category->description; ?></label>
                    <input id="<?= $category->id; ?>" type="checkbox" value="<?= $category->id; ?>" name="categories[]">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if (isset($messages['categories'])) : ?>
        <small class="form-text text-danger"><?= $messages['categories'][0]; ?></small>
    <?php endif; ?>

    <div class="form-group">
        <label for="model">Modelo</label>
        <select class="form-control" id="model" name="model">
            <?php foreach ($models as $model) : ?>
                <option <?= (isset($vehicle) && $vehicle->idModel == $model->id) ? 'selected' : ''; ?> value="<?= $model->id; ?>"><?= $model->description; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php if (isset($messages['model'])) : ?>
        <small class="form-text text-danger"><?= $messages['model'][0]; ?></small>
    <?php endif; ?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>