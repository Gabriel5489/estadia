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
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('imagenes/Logo.png') ?>" alt="" width="80" height="30">
        </a>
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
    <div class="container my-auto px-1 py-1">
        <div class="row text-center p-3">
            <h2>Citas pendientes</h2>
        </div>
        <div class="col"><a class="btn btn-primary" href="#" role="button">Añadir cita</a></div>
        <div class="row" style="margin-top:5px">
        <center>
            <div class="col-mx-auto">
            <table class="table table-success table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Cita</th>
                        <th scope="col">Alumno</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">Fecha de la cita</th>
                        <th scope="col">Hora de la cita</th>
                        <th scope="col">Aula</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($info as $row){ ?>
                    <tr>
                        <th scope="row"><?= $row->Num_Cita ?></th>
                        <td><?= $row->Alumno." ".$row->APaterno." ".$row->AMaterno ?></td>
                        <td><?= $row->Tutor ?></td>
                        <td><?= $row->Fecha_Cita ?></td>
                        <td><?= $row->Hora ?></td>
                        <td><?= $row->Aula ?></td>
                        <td><?= $row->Telefono ?></td>
                        <td><?= $row->Estado_Cita ?></td>
                        <td>
                            <a class="btn btn-danger" href="#" role="button">Cancelar</a>
                            <a class="btn btn-info" href="#" role="button">Reagendar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </center>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>