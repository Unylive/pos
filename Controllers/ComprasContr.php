<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TipocomprobantesModel;
//use App\Models\UnidadesModel;

class ComprasContr extends BaseController
{

    protected $productos;
    protected $reglas;

    public function __construct() {

        $this->productos = new ComprasModel();
        //$this->unidades = new UnidadesModel();
        
        $this->tipocomprobantes = new TipocomprobantesModel();

        helper(['form']); //esto es para trabajar correctamente con el formulario

        
    }

    public function index($activo = 1) {

        $productos = $this->productos->where('activo', $activo)->findall();
        $data = ['titulo' => 'Productos', 'datos' => $productos];

        echo view('header');
        echo view('comprasView/productos');
        echo view('footer_piepg');
    }

    //FUNCION PARA LA VISTA NUEVO UNIDAD 
    public function nuevo() {

        //$tipocomprobantes = $this->tipocomprobantes->where('activo_tpcomprobante', 1)->findall();

        //$data = ['titulo' => 'Agregar Compra', 'tipocomprobantes' => $tipocomprobantes];

        echo view('header');
        //echo view('comprasView/nuevo', $data);
        echo view('comprasView/nuevo');
        echo view('footer_piepg');

        
    }

    //EL METODO SE DEBE LLAMAR INSERTAR SEGUN EL ARCHIVO "nuevo.php"
     /* public function insertar() {

       if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->productos->save([
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
            return redirect()->to(base_url() . '/productosContr');*/
       // } else {
            //si no se cumple la sentencia nuevamente imprimimos el formulario
            //adisionamos validation => validator con esto devuelve la validaciones que no se cumplieron
            /*$unidades = $this->unidades->where('activo', 1)->findall();
            $categorias = $this->categorias->where('activo', 1)->findall();

            $data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias,
            'validation' => $this->validator];

            echo view('header');
            echo view('productosView/nuevo', $data);
            echo view('footer_piepg');
        }
    } */


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
