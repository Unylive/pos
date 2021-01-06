<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model{

    protected $table      = 'roles';
    protected $primaryKey = 'id_rol';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nomb_rol', 'activo_rol']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>