<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{

    protected $table      = 'usuarios';
    protected $primaryKey = 'id_user';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cod_user', 'usuario', 'password_user', 'nomb_user', 'direc1_user', 'ncasa_user', 'direc2_user',
    'refer_user', 'provin_user', 'ciudad_user', 'email_user', 'fono1_user', 'celu1_user', 'Id_caja', 'Id_rol', 'activo_user']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>