<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function __construct(){
        helper(['url' , 'Form_helper']);
    }

	public function index()
	{
		return view('welcome_message');
	}

    public function register()
    {
        return view('auth/register');
    }

    public function save(){
        $validation = $this->validate([
            'Matricula'=>'required',
            'Nombre'=>'required',
            'APaterno'=>'required',
            'AMaterno'=>'required',
            'Telefono'=>'required',
            'Correo'=>'required|valid_email|is_unique[tblalum_docen.vchCorreo]',
            'Tutor'=>'required',
            'Usuario'=>'required',
            'Password'=>'required|min_length[5]|max_length[15]',
            'CPassword'=>'required|min_length[5]|max_length[15]|matches[password]'
        ]);

        if(!$validation){
            return view('auth/register', ['validation'=>$this->validator]);
        }else{
            echo 'Formulario validado correctamente';
        }
    }
}
