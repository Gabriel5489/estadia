<?php

namespace App\Controllers;

class Docente extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();

        $result=$db->query('CALL spGetCitaDocente(12345678);')->getResult();
        //print_r($result);

        $datos = [
            'title'=>'Datos de la cita',
            'info'=>$result
        ];
        //print_r($datos);

		return view('docente/index', $datos);
	}
}


?>