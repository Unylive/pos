<?php

namespace App\Models;

use CodeIgniter\Model;


class ConfiguracionModel extends Model{

    protected $table      = 'configuracion';
    protected $primaryKey = 'id_conf';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $useSoftUpdates = false;
    protected $useSoftCreates = false;

    protected $allowedFields = ['nomb_conf', 'valor_conf']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = null; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = null;
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>