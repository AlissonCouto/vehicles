<?php
$this->layout('../_theme');
?>

<h1>Veículos</h1>

<a class="btn bg-success text-white" href="<?= url('create'); ?>">NOVO</a>

<?php
if ($vehicles) :
?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Chassi</th>
                <th>Placa</th>
                <th>Ano</th>
                <th>Modelo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?= $vehicle->id; ?></td>
                    <td><?= $vehicle->chassis; ?></td>
                    <td><?= $vehicle->plate; ?></td>
                    <td><?= $vehicle->year; ?></td>
                    <td><?= $vehicle->model->description; ?></td>
                    <td><a href="<?= url("edit/{$vehicle->id}"); ?>">Editar</a></td>
                    <td><a href="<?= url("delete/{$vehicle->id}"); ?>">Excluir</a></td>
                    <td><a href="<?= url("show/{$vehicle->id}"); ?>">Detalhes</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
else :
?>
    <h1>Não existe veículos cadastrados!</h1>
<?php endif; ?>