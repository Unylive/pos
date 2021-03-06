<?php

namespace App\Models;

use CodeIgniter\Model;


class TipocomprobantesModel extends Model{

    protected $table      = 'tipocomprobantes';
    protected $primaryKey = 'id_tpcomp';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cod_tpcomprobante', 'nomb_tpcomprobante', 'activo_tpcomprobante']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>