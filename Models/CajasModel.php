<?php

namespace App\Models;

use CodeIgniter\Model;

class CajasModel extends Model{

    protected $table      = 'cajas';
    protected $primaryKey = 'id_caja';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['numero_caja', 'nomb_caja', 'folio_caja', 'activo_caja']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>