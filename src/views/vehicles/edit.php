<?php
$this->layout('../_theme');

if ($vehicle) :
?>
    <?php if (isset($messages[0]) && $success) : ?>
        <span class="text-success">
            <?= $messages[0]; ?>
        </span>
    <?php endif; ?>

    <h2>Edição de veículo</h2>
    <form method="POST" action="<?= url("update/{$vehicle->id}"); ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="chassis">Nº chassi</label>
            <input type="text" class="form-control" id="chassis" name="chassis" value="<?= $vehicle->chassis; ?>" placeholder="O nº do chassi">
        </div>
        <?php if (isset($messages['chassis'])) : ?>
            <small class="form-text text-danger"><?= $messages['chassis'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <label for="plate">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate" value="<?= $vehicle->plate; ?>" placeholder="A placa">
        </div>
        <?php if (isset($messages['plate'])) : ?>
            <small class="form-text text-danger"><?= $messages['plate'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <label for="year">Ano</label>
            <input type="text" class="form-control" id="year" name="year" value="<?= $vehicle->year; ?>" placeholder="O ano do veículo">
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
                        <input 
                            id="<?= $category->id; ?>"
                            type="checkbox" 
                            value="<?= $category->id; ?>" 
                            name="categories[]"
                            <?= in_array($category->id, $vehicle->categoriesChecked()) ? 'checked' : ''; ?>>
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
                    <option <?= ($vehicle->model->id === $model->id) ? 'selected' : ''; ?> value="<?= $model->id; ?>"><?= $model->description; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <?php if (isset($messages['model'])) : ?>
            <small class="form-text text-danger"><?= $messages['model'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
<?php
else :
?>
    <h1>Não existe veículos cadastrados!</h1>
<?php endif; ?>