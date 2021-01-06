<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnidadesModel;

class Unidades extends BaseController {

    protected $unidades;
    protected $reglas;

    public function __construct() {

        $this->unidades = new UnidadesModel();
        helper(['form']); //esto es para trabajar correctamente con el formulario

        $this->reglas = [
            'nombre' => [
            'rules' => 'required',
            'errors' => ['required' => 'El campo {field} es obligatorio.' ]
            ],
            'nombre_corto' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.' ]
                ]
            ];

    }

    public function index($activo = 1) {

        $unidades = $this->unidades->where('activo', $activo)->findall();
        $data = ['titulo' => 'Unidades', 'datos' => $unidades];

        echo view('header');
        echo view('unidades/unidades', $data);
        echo view('footer_piepg');
    }

    //FUNCION PARA LA VISTA NUEVO UNIDAD 
    public function nuevo() {

        $data = ['titulo' => 'Agregar Unidad'];

        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer_piepg');
    }

    //EL METODO SE DEBE LLANMAR INSERTAR SEGUN EL ARCHIVO "nuevo.php"
    public function insertar() {
        //PARA INSERTAR UTILIZAMOS this DESPUES LA VARIABLE "unidades" SEGUIDO DE save()
        //DETRO DEL PARENTESIS LOS dtos que vamos a enviar dentro de un array[]
        //$this: es una referencia al objeto invocador
        //request: nos permite capturar variables enviadas desde formularios con los métodos GET o POST
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->unidades->save([
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')
                ]);
                //luego agregamos un retorno - redireccionando    
        return redirect()->to(base_url().'/unidades');
        }else{
            //si no se cumple la sentencia nuevamente imprimimos el formulario
            //adisionamos validation => validator con esto devuelve la validaciones que no se cumplieron
            $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];

        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer_piepg');

        }
        
        
    }


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

    public function editar($id, $valid=null) {

        $unidad = $this->unidades->where('id',$id)->first();

        if($valid != null){
            $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad, 'validation' -> $valid];
        }else{
            $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad];
        }
        
        echo view('header');
        echo view('unidades/editar', $data);
        echo view('footer_piepg');

        
    }

    //el archivo editar esta creado en "Views - unidades - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function actualizar() {
        
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->unidades->update(
            $this->request->getPost('id'), //recivimos el id como oculto
            [
            'nombre' => $this->request->getPost('nombre'),
            'nombre_corto' => $this->request->getPost('nombre_corto')
            ]);
            //luego agregamos un retorno     
            return redirect()->to(base_url().'/unidades');
        }else{
            return $this->editar($this->request->getPost('id'),$this->validator);
        }


    }

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function eliminar($id) {
        
        $this->unidades->update($id,['activo' =>0]);

        //luego agregamos un retorno     
        return redirect()->to(base_url().'/unidades');
    }

    public function eliminados($activo = 0) {

        $unidades = $this->unidades->where('activo', $activo)->findall();
        $data = ['titulo' => 'Unidades Eliminadas', 'datos' => $unidades];

        echo view('header');
        echo view('unidades/eliminados', $data); //llama a la vista
        echo view('footer_piepg');
    }

    public function reingresar($id) {
        
        $this->unidades->update($id,['activo' =>1]);

        //luego agregamos un retorno     
        return redirect()->to(base_url().'/unidades');
    }


}
