<?php

namespace App\Models;

use CodeIgniter\Model;

class ProveedoresModel extends Model{

    protected $table      = 'proveedores';
    protected $primaryKey = 'id_prov';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cod_prov', 'nomb_prov', 'direc_prov', 'fono1_prov',
    'celu1_prov', 'contact_prov', 'ciudad_prov', 'provincia_prov', 'email_prov', 
    'activo_prov']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>