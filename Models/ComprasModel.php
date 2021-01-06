<?php

namespace App\Models;

use CodeIgniter\Model;

class comprasModel extends Model{

    protected $table      = 'compras';
    protected $primaryKey = 'id_compra';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['flio_comp', 'baseimp0_comp', 'baseimp12_comp', 'impto0_comp', 
    'impto12_comp', 'total_comp', 'Id_usuario', 'activo']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = '';
    protected $deletedField  = ''; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>