<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>

    <link rel="stylesheet" href="<?= url("src/views/css/bootstrap.min.css"); ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="header col-12">
                <?php if ($this->section('sidebar')) :
                    echo $this->section('sidebar');
                else :
                ?>
                    <nav class="navbar p-3 navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="<?= url(); ?>">Menu</a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/vehicles/' ? 'active' : ''; ?>" href="<?= url(); ?>">Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/vehicles/brands' ? 'active' : ''; ?>" href="<?= url('brands'); ?>">Marcas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/vehicles/models' ? 'active' : ''; ?>" href="<?= url('models'); ?>">Modelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/vehicles/categories' ? 'active' : ''; ?>" href="<?= url('categories'); ?>">Categorias</a>
                            </li>
                        </ul>
                    </nav>

                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="content col-12">
                <?= $this->section('content'); ?>
            </div>
        </div>

        <div class="row">
            <div class="footer col-12">
                <?= SITE; ?> todos os direitos reservados!
            </div>
        </div>
    </div>

    <script src="<?= url("src/views/js/jquery.min.js"); ?>"></script>
    <script src="<?= url("src/views/js/bootstrap.min.js"); ?>"></script>
    <?= $this->section('scripts'); ?>
</body>

</html>