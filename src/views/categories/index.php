<?php
$this->layout('../_theme');
?>
<h1>Categorias</h1>

<a class="btn bg-success text-white" href="<?= url('categories/create'); ?>">NOVO</a>
<?php
if ($categories) :
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?= $category->id; ?></td>
                    <td><?= $category->description; ?></td>
                    <td><a href="<?= url("categories/edit/{$category->id}"); ?>">Editar</a></td>
                    <td><a href="<?= url("categories/delete/{$category->id}"); ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
else :
?>
    <h1>Não existe categorias cadastradas!</h1>
<?php endif; ?>