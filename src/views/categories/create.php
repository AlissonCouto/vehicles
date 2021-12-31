<?php $this->layout('../_theme'); ?>

    <h2>Cadastro de categoria</h2>
    <form method="POST" action="<?= url("categories/store"); ?>">
        <div class="form-group">
            <label for="category">Categoria</label>
            <input type="text" class="form-control" id="category" name="description" value="<?= (isset($category)) ? $category->description : ''; ?>" placeholder="Digite a categoria">
        </div>
        <?php if (isset($messages['description'])) : ?>
            <small class="form-text text-danger"><?= $messages['description'][0]; ?></small>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>