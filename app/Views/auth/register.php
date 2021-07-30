<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .form-group{
        text-align:left;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container my-auto p-4">
        <div class="row" style="margin-top:5px">
        <center>
            <div class="col-mx-4 mx-5">
                <div class="card text-center" style="width:24rem">
                    <div class="card-header">
                        <h2>Registrarse</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('auth/save') ?>" method="post" style="margin-bottom:20px">
                        <?= csrf_field() ?>
                        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif ?>

                        <?php if(!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif ?>

                            <div class="form-group p-1">
                                <label for="Matricula">Matricula</label>
                                <input type="text" class="form-control" name="Matricula" placeholder="Ingresa tu Matricula" value="<?= set_value('Matricula'); ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Matricula') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" placeholder="Ingresa tu nombre" value="<?= set_value('Nombre') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Nombre') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="APaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="APaterno" placeholder="Ingresa tu Apellido Paterno" value="<?= set_value('APaterno') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'APaterno') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="AMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" name="AMaterno" placeholder="Ingresa tu Apellido Materno" value="<?= set_value('AMaterno') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'AMaterno') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Telefono">Telefono</label>
                                <input type="text" class="form-control" name="Telefono" placeholder="Ingresa tu telefono" value="<?= set_value('Telefono') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Telefono') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Correo">Correo</label>
                                <input type="text" class="form-control" name="Correo" placeholder="Ingresa tu Correo" value="<?= set_value('Correo') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Correo') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Tutor">Tutor</label>
                                <input type="text" class="form-control" name="Tutor" placeholder="Ingresa el nombre del tutor" value="<?= set_value('Tutor') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Tutor') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Usuario">Usuario</label>
                                <input type="text" class="form-control" name="Usuario" placeholder="Ingresa tu usuario" value="<?= set_value('Usuario') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Usuario') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Password">Contraseña</label>
                                <input type="password" class="form-control" name="Password" placeholder="Ingresa tu contraseña" value="<?= set_value('Password') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Password') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="CPassword">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="CPassword" placeholder="Repite tu contraseña" value="<?= set_value('CPassword') ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'CPassword') : "" ?></span>
                            </div>
                            <div class="form-group p-1" style="text-align: center">
                                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                            </div>
                            <a href="<?= site_url('auth/') ?>">Ya tengo una cuenta</a>
                        </form>
                    </div>
                </div>
            </div>
        </center>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>