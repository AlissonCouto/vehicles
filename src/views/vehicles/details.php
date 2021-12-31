<?php
$this->layout('../_theme');

if ($vehicle) :
?>
    <?php if (isset($messages[0]) && $success) : ?>
        <span class="alert alert-success" class="alert alert-success" role="alert">
            <?= $messages[0]; ?>
        </span>
    <?php endif; ?>

    <h2>Detalhes do veículo</h2>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $vehicle->model()->description; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $vehicle->model()->brand()->description; ?></h6>

            <hr />

            <strong>Chassi: </strong> <span><?= $vehicle->chassis; ?></span> <br>
            <strong>Placa: </strong> <span><?= $vehicle->plate; ?></span> <br>
            <strong>Ano: </strong> <span><?= $vehicle->year; ?></span> <br>

            <hr />

            <strong>Categorias: </strong> <br>

            <?php foreach ($vehicle->categories() as $category) : ?>
                <span><?= $category->description; ?></span> <br>
            <?php endforeach; ?>
        </div>
    </div>
<?php
else :
?>
    <h1>Veículo não encontrado!</h1>
<?php endif; ?>