<?php

namespace App\Controllers;
use \Statickidz\GoogleTranslate;

class Alumno extends BaseController
{
    public function index()
    {

        $db = \Config\Database::connect();

        $result=$db->query('CALL spGetCitaAlumno(20171343);')->getResult();
        //print_r($result);

        $datos = [
            'title'=>'Datos de la cita',
            'info'=>$result
        ];
        //print_r($datos);

		return view('alumno/index.php', $datos);
    }

}


?>