<?php
$this->layout('../_theme');

if ($model) :
?>
    <?php if (isset($messages[0]) && $success) : ?>
        <span class="text-success">
            <?= $messages[0]; ?>
        </span>
    <?php endif; ?>

    <h2>Edição de modelos</h2>

    <form method="POST" action="<?= url("models/update/{$model->id}"); ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control" id="model" name="description" value="<?= (isset($model)) ? $model->description : ''; ?>" placeholder="Digite o modelo">
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
    <h1>Modelo não encontrado!</h1>
<?php endif; ?>