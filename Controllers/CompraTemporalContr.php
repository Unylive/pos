<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompraTemporalModel;
//use App\Models\TipocomprobantesModel;
use App\Models\ProductosModel;
//use \ModeAppls\;
//use App\Models\UnidadesModel;

class CompraTemporalContr extends BaseController
{

    protected $compra_temporal, $productos;
    //protected $reglas;

    public function __construct() {

        $this->compra_temporal = new CompraTemporalModel();
        $this->productos = new ProductosModel();
        //$this->unidades = new UnidadesModel();
        
        //$this->tipocomprobantes = new TipocomprobantesModel();

    }

      public function inserta($id_producto, $cantidad, $id_compra) {

        $error = '';
        //aqui estamos asiendo la consulta a la tabla productos por el id_prod
        //y pasandole a una variable $id_producto y que traiga LOS PRIMEROS DATOS
        $producto = $this->productos->where('id_prod', $id_producto)->first();
        
        if($producto){
            
            $datosExiste = $this->compra_temporal->porIdProductoCompra($id_producto, $id_compra);
            
            if($datosExiste){

                $cantidad = $datosExiste->cantidad + $cantidad;
                $subtotal = $cantidad * $datosExiste->precio;
            
            }else{
                $subtotal = $cantidad * $producto['precio_comp'];
    
                $this->compra_temporal->save([
                    'folio' => $id_compra,               
                    'id_producto' => $id_producto,
                    'codigo' => $id_producto['codigo'],
                    'nombre' => $id_producto['nomb_prod'],
                    'cantidad' => $cantidad,
                    'precio' => $id_producto['precio_comp'],
                    'subtotal' => $subtotal,
                    //'concepto_comptemp' => $this->request->getPost('concepto_comp'),
                    //'tipo_doccomp' => $this->request->getPost('id_tpcomp'),
                    //'nserie1_comp' => $this->request->getPost('nserie1_comp'),
                    //'nserie2_comp' => $this->request->getPost('nserie2_comp'),
                    //'//nsecuen_doccomp' => $this->request->getPost('nsecuen_doccomp'),
                    //'precio_comp' => $this->request->getPost('subtotal'),
                    //'baseimp0_comptemp' => $id_producto['id_prod'],
                    //'impto0_comptemp' => $this->request->getPost('subtotal'),
                    //'impto12_comptemp' => $this->request->getPost('impto12_comp'),
                    //'impto2_comptemp' => $this->request->getPost('otroimpt0_comp'),
                    //'total_comptemp' => $this->request->getPost('total_comp'),
                    //'activo_comptemp' => $id_producto['id_prod'],
                ]);
            }
            
        }else{
            $error = 'No Existe el Producto';
        }
        
        $res['error'] = $error;
        echo json_encode($res);    
    }


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

   /* public function editar($id) {

        $unidades = $this->unidades->where('activo', 1)->findall();
        $categorias = $this->categorias->where('activo', 1)->findall();
        $producto = $this->productos->where('id_prod', $id)->first();
        $data = [
            'titulo' => 'Editar Producto', 'unidades' => $unidades, 'categorias' => $categorias,
            'producto' => $producto
        ];

        echo view('header');
        echo view('productosView/editar', $data);
        echo view('footer_piepg');
    } */

    //el archivo editar esta creado en "Views - productos - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
   /* public function actualizar() {

        //recivimos el id como oculto
        $this->productos->update($this->request->getPost('id_prod'), [
            'cod_prod' => $this->request->getPost('cod_prod'),
            'nomb_prod' => $this->request->getPost('nomb_prod'),
            'precio_vnta' => $this->request->getPost('precio_vnta'),
            'precio_comp' => $this->request->getPost('precio_comp'),
            'stock_mini' => $this->request->getPost('stock_mini'),
            'invent_prod' => $this->request->getPost('invent_prod'),
            'id_unidad' => $this->request->getPost('id_unidad'),
            'id_categ' => $this->request->getPost('id_categ'),
        ]);

        //luego agregamos un retorno - redireccionando    
        //return redirect()->to(base_url() . '/productosContr');
    } */

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
   /* public function eliminar($id)
    {

        $this->productos->update($id, ['activo' => 0]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/productosContr');
    } */

   /* public function eliminados($activo = 0)
    {

        $productos = $this->productos->where('activo', $activo)->findall();
        $data = ['titulo' => 'Unidades Eliminadas', 'datos' => $productos];

        echo view('header');
        echo view('productosView/eliminados', $data); //llama a la vista
        echo view('footer_piepg'); 
    } */

   /* public function reingresar($id)
    {

      /*  $this->productos->update($id, ['activo' => 1]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/productosContr');
    } */
}
