<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table  = 'tblalum_docen';
    protected $primaryKey = 'intMatricula';
    protected $allowFields = ['vchNombre', 'vchAPaterno', 'vchAMaterno', 'vchTelefono', 'vchCorreo', 'vchTutor', 'idUsuario'];
}

?>