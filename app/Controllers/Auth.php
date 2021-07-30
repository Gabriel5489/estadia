<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Hash;

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
            'Matricula'=>[
                'rules'=>'required|integer|min_length[8]|max_length[8]|is_unique[tblalum_docen.intMatricula]',
                'errors'=>[
                    'required'=>'El campo matricula es obligatorio',
                    'integer'=>'Ingresa solo números',
                    'min_length'=>'Minimo 8 caracteres',
                    'max_length'=>'Maximo 8 caracteres',
                    'is_unique'=>'Esta matricula ya está registrada'
                ]
            ],
            'Nombre'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Nombre es obligatorio'
                ]
            ],
            'APaterno'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Apellido paterno es obligatorio'
                ]
            ],
            'AMaterno'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Apellido materno es obligatorio'
                ]
            ],
            'Telefono'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo telefono es obligatorio'
                ]
            ],
            'Correo'=>[
                'rules'=>'required|valid_email|is_unique[tblalum_docen.vchCorreo]',
                'errors'=>[
                    'required'=>'El campo Correo es obligatorio',
                    'valid_email'=>'El correo es invalido',
                    'is_unique'=>'Este correo ya está en uso'
                ]
            ],
            'Tutor'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Tutor es obligatorio'
                ]
            ],
            'Usuario'=>[
                'rules'=>'required|is_unique[tblusuario.vchUsuario]',
                'errors'=>[
                    'required'=>'El campo Usuario es obligatorio',
                    'is_unique'=>'Este usuario ya existe'
                ]
            ],
            'Password'=>[
                'rules'=>'required|min_length[5]|max_length[15]',
                'errors'=>[
                    'required'=>'El campo Contraseña es obligatorio',
                    'min_length'=>'Minimo 5 caracteres',
                    'max_length'=>'Maximo 15 caracteres'
                ]
            ],
            'CPassword'=>[
                'rules'=>'required|min_length[5]|max_length[15]|matches[Password]',
                'errors'=>[
                    'required'=>'El campo Confirmar contraseña es obligatorio',
                    'min_length'=>'Minimo 5 caracteres',
                    'max_length'=>'Maximo 15 caracteres',
                    'matches'=>'Las contraseñas no coinciden'
                ]
            ]
        ]);

        if(!$validation){
            return view('auth/register', ['validation'=>$this->validator]);
        }else{
            $db = \Config\Database::connect();
            $nombre=$this->request->getPost('Nombre');
            $matricula=$this->request->getPost('Matricula');
            $apaterno=$this->request->getPost('APaterno');
            $amaterno=$this->request->getPost('AMaterno');
            $telefono=$this->request->getPost('Telefono');
            $correo=$this->request->getPost('Correo');
            $tutor=$this->request->getPost('Tutor');
            $usuario=$this->request->getPost('Usuario');
            $password=Hash::make($this->request->getPost('Password'));

            $query = "CALL spAddRegistro(".$matricula.", '".$nombre."', '".$apaterno."', '".$amaterno."', ".$telefono.", '".$correo."', '".$tutor."', '".$usuario."', '".$password."');";
            $result = $db->query($query);

            if(!$result){
                return redirect()->back()->with('fail', 'Algo salio mal');
            }else{
                return redirect()->to('auth/register')->with('success', 'Te has registrado correctamente');
            }
        }
    }
}
