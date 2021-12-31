<?php
$this->layout('../_theme');
?>
<h1>Marcas</h1>

<a class="btn bg-success text-white" href="<?= url('brands/create'); ?>">NOVO</a>
<?php
if ($brands) :
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($brands as $brand) : ?>
                <tr>
                    <td><?= $brand->id; ?></td>
                    <td><?= $brand->description; ?></td>
                    <td><a href="<?= url("brands/edit/{$brand->id}"); ?>">Editar</a></td>
                    <td><a href="<?= url("brands/delete/{$brand->id}"); ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
else :
?>
    <h1>Não existe marcas cadastradas!</h1>
<?php endif; ?>