<?php
$this->layout('../_theme');
?>
<h1>Modelos</h1>

<a class="btn bg-success text-white" href="<?= url('models/create'); ?>">NOVO</a>

<?php
if ($models) :
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($models as $model) : ?>
                <tr>
                    <td><?= $model->id; ?></td>
                    <td><?= $model->description; ?></td>
                    <td><?= $model->brand->description; ?></td>
                    <td><a href="<?= url("models/edit/{$model->id}"); ?>">Editar</a></td>
                    <td><a href="<?= url("models/delete/{$model->id}"); ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
else :
?>
    <h1>Não existe modelos cadastrados!</h1>
<?php endif; ?>