<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class CategoriasContr extends BaseController {

    protected $categorias;

    public function __construct() {

        $this->categorias = new CategoriasModel();
    }

    public function index($activo = 1) {

        $categorias = $this->categorias->where('activo', $activo)->findall();
        $data = ['titulo' => 'Categorias', 'datos' => $categorias];

        echo view('header');
        echo view('categorias/categorias', $data);
        echo view('footer_piepg');
    }

    //FUNCION PARA LA VISTA NUEVO UNIDAD 
    public function nuevo() {

        $data = ['titulo' => 'Agregar Categorias'];

        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer_piepg');
    }

    //EL METODO SE DEBE LLANMAR INSERTAR SEGUN EL ARCHIVO "nuevo.php"
    public function insertar() {
        //PARA INSERTAR UTILIZAMOS this DESPUES LA VARIABLE "categorias" SEGUIDO DE save()
        //DETRO DEL PARENTESIS LOS dtos que vamos a enviar dentro de un array[]
        $this->categorias->save([
            'nomb_categ' => $this->request->getPost('nomb_categ'),
            
            ]);
        //luego agregamos un retorno - redireccionando    
        return redirect()->to(base_url().'/categoriasContr');
    }


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

    public function editar($id) {
        
        $unidad = $this->categorias->where('id',$id)->first();
        $data = ['titulo' => 'Editar Categorias', 'datos' => $unidad];

        echo view('header');
        echo view('categorias/editar', $data);
        echo view('footer_piepg');

        
    }

    //el archivo editar esta creado en "Views - categorias - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function actualizar() {
        
        $this->categorias->update(
            $this->request->getPost('id'), //recivimos el id como oculto
            [
            'nomb_categ' => $this->request->getPost('nomb_categ'),
            ]);
        //luego agregamos un retorno     
        return redirect()->to(base_url().'/categoriasContr');
    }

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function eliminar($id) {
        
        $this->categorias->update($id,['activo' =>0]);

        //luego agregamos un retorno     
        return redirect()->to(base_url().'/categoriasContr');
    }

    public function eliminados($activo = 0) {

        $categorias = $this->categorias->where('activo', $activo)->findall();
        $data = ['titulo' => 'Categorias Eliminadas', 'datos' => $categorias];

        echo view('header');
        echo view('categorias/eliminados', $data); //llama a la vista
        echo view('footer_piepg');
    }

    public function reingresar($id) {
        
        $this->categorias->update($id,['activo' =>1]);

        //luego agregamos un retorno     
        return redirect()->to(base_url().'/categoriasContr');
    }


}