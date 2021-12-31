<?php
$this->layout('../_theme');

if ($category) :
?>
    <?php if (isset($messages[0]) && $success) : ?>
        <span class="text-success">
            <?= $messages[0]; ?>
        </span>
    <?php endif; ?>

    <h2>Edição de categoria</h2>
    <form method="POST" action="<?= url("categories/update/{$category->id}"); ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="category">Descrição</label>
            <input type="text" class="form-control" id="category" name="description" value="<?= $category->description; ?>" placeholder="Digite a categoria">
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
    <h1>Categoria não encontrada!</h1>
<?php endif; ?>