<?php
$hoy = date("Y-m-d");
$hora = date("H") + 1;

if(strlen($hora) == 1){
    $hora = "0".$hora;
}

$miArray = (array) $alumnos;
$json = json_encode($miArray);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="<?= base_url('CSS/style.css') ?>">
<script src="<?= base_url('zelect-master/zelect.js') ?>"></script>
<script src="<?= base_url('scripts/mi-script.js') ?>"></script>

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
            <a class="nav-link active" aria-current="page" href="#">Registrarse</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Iniciar Sesión</a>
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
                        <h2>Cita</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('docente/addCita') ?>" method="post" style="margin-bottom:20px">
                        <?= csrf_field() ?>

                            <div class="form-group p-1">
                                <section id="intro">
                                    <select name="Matricula" onchange="nombre()" id="Matricula">
                                            <option value="" selected>---Alumnos---</optin>
                                            <?php foreach($alumnos as $fila){ ?>
                                                <option value="<?= $fila->intMatricula ?>" id="<?= $fila->intMatricula ?>"><?= $fila->Nombre ?></option>
                                                
                                            <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Matricula') : "" ?></span>
                                    
                                </section>
                                <h5 id="mat" style="color: green"></h5>
                            </div>
                            <div class="form-group p-1">
                                <label for="Fecha">Fecha de la cita</label>
                                <input type="date" class="form-control" name="Fecha" placeholder="" value="<?= isset($validation) ? set_value('Fecha') : $hoy ?>" min="<?= $hoy ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Fecha') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="Area">Selecciona el area</label>
                                    <select name="Area" class="form-select" value="<?= set_value('Area') ?>">
                                        <?php foreach($info as $row){ ?>
                                        <option value="<?= $row->idAreas ?>" id="<?= $row->idAreas ?>"><?= $row->vchNombreArea ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Area') : "" ?></span>
                            </div>
                            <div class="form-group p-1">
                                <label for="AMaterno">Hora de la cita</label>
                                <input type="time" class="form-control" name="Hora" placeholder="" min="08:00" max="17:00" value="<?= isset($validation) ? set_value('Hora') : $hora.":00" ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'Hora') : "" ?></span>
                            </div>
                            <div class="form-group p-1" style="text-align: center">
                                <button class="btn btn-primary btn-block" type="submit" onclick="verificar()">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
        </div>
    </div>
</body>
<script>
    const tablero = JSON.stringify(<?= $json ?>);
    const id = <?= isset($validation) ? set_value('Area') : 0 ?>;
    if(id){
        console.log("Entro al if");
        const opcion = document.getElementById(id);
        opcion.setAttribute('selected','');
    }

    function verificar(){
        var select = document.getElementById('Matricula').value;
        console.log(select);
        if(select==""){
            return false;
        }
    }

    function nombre(){
        var select = document.getElementById('Matricula').value;
        var tutor;
        var texto = document.getElementById('mat');
        if(select!=""){
            var opcion = document.getElementById(select).textContent;
            texto.innerText = "Matricula: " + select;
        }else{
            texto.innerText = "Selecciona una opción valida"
        }
        // for(var i = 0; i<tablero.length; i++){
        //     console.log(tablero[0][1]);
        //     if(tablero[i]['intMatricula']==select){
        //         tutor = [i]['Nombre'];
        //     }
        // }
        
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>