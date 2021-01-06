<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model{

    protected $table      = 'productos';
    protected $primaryKey = 'id_prod';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cod_prod', 'nomb_prod', 'precio_vnta', 'precio_comp', 
    'exiten_prod', 'stock_mini', 'invent_prod', 'id_unidad', 'id_categ', 'activo_prod']; 

    protected $useTimestamps = true;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = 'fecha_alta'; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at'; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

}


?>