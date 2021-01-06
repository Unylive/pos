<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model{

    protected $table      = 'clientes';
    protected $primaryKey = 'id_clt';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cod_clt', 'nomb_clt', 'direc_clt', 'fono1_clt',
    'celu1_clt', 'email_clt', 'activo_clt']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>