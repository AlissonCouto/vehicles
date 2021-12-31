<?php
$this->layout('../_theme');

if ($brand) :
?>
    <?php if (isset($messages[0]) && $success) : ?>
        <span class="text-success">
            <?= $messages[0]; ?>
        </span>
    <?php endif; ?>

    <h2>Edição de marca</h2>
    <form method="POST" action="<?= url("brands/update/{$brand->id}"); ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="brand">Descrição</label>
            <input type="text" class="form-control" id="brand" name="description" value="<?= $brand->description; ?>" placeholder="Digite a marca">
        </div>
        <?php if (isset($messages['description'])) : ?>
            <small class="form-text text-danger"><?= $messages['description'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
<?php
else :
?>
    <h1>Não existe marcas cadastradas!</h1>
<?php endif; ?>