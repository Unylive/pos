<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraTemporalModel extends Model{

    protected $table      = 'compra_temporal';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio', 'id_producto', 'codigo', 'nombre', 'cantidad', 'precio', 'subtotal']; 

    protected $useTimestamps = false;   //verdadeedro por que no vamos a eliminar
    protected $createdField  = ''; //estas columnas van a guardar la fecha y hora cuando hamos la instruccion
    protected $updatedField  = '';
    protected $deletedField  = ''; //este campo no lo agregamos a la tabla porque no vamos a eliminar

    protected $validationRules    = []; //en este sitio se pueden ingresar reglas de validaciones
    protected $validationMessages = [];
    protected $skipValidation     = false;

    
    //este metodo va ha recibir el $id_producto y el $folio para buscar en label
    //tabla compra2_temporal y no duplicar el registro
    public function porIdProductoCompra($id_producto, $folio){

            //usamos this hacindo referencia a este modelo
        $this->select('*');
        $this->where('folio', $folio);
        $this->where('id_producto', $id_producto);
        $datos = $this->get()->getRow();
        return $datos;

        //en la variable datos nos trae todo el resultado por una columna
        //llamamos a este modelo desde "ComprasTemporalContr"

    }

}


?>