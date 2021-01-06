<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class ConfiguracionContr extends BaseController {

    protected $configuracion;
    protected $reglas;

    public function __construct() {

        $this->configuracion = new ConfiguracionModel();
        helper(['form']); //esto es para trabajar correctamente con el formulario

        $this->reglas = [
            'tienda_nombre' => [
            'rules' => 'required',
            'errors' => ['required' => 'El campo {field} es obligatorio.' ]
            ],
            'tienda_rfc' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.' ]
                ]
            ];

    }

    public function index($activo = 1) {

        /*$configuracion = $this->configuracion->where('activo', $activo)->findall();*/
        $nomb_conf = $this->configuracion->where('nomb_conf', 'tienda_nombre')->first();
        $tienda_rfc = $this->configuracion->where('nomb_conf', 'tienda_rfc')->first();
        $tienda_fono1 = $this->configuracion->where('nomb_conf', 'tienda_fono1')->first();
        $tienda_fono2 = $this->configuracion->where('nomb_conf', 'tienda_fono2')->first();
        $tienda_email = $this->configuracion->where('nomb_conf', 'tienda_email')->first();
        $tienda_direc1 = $this->configuracion->where('nomb_conf', 'tienda_direc1')->first();
        $ticket_leyenda = $this->configuracion->where('nomb_conf', 'ticket_leyenda')->first();
        //$nomb_conf = $this->configuracion->where('nomb_conf', 'tienda_nombre')->first();
        //$nomb_conf = $this->configuracion->where('nomb_conf', 'tienda_nombre')->first();

        $data = ['titulo' => 'Configuracion - Datos', 'nomb_conf' => $nomb_conf, 'tienda_rfc' => $tienda_rfc, 
        'tienda_fono1' => $tienda_fono1, 'tienda_fono2' => $tienda_fono2, 'tienda_email' => $tienda_email, 
        'tienda_direc1' => $tienda_direc1, 'ticket_leyenda' => $ticket_leyenda ];
        //$data = ['titulo' => 'Configuracion'];

        echo view('header');
        echo view('configuracion/configuracion', $data);
        echo view('footer_piepg');
    }

  


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

    

    //el archivo editar esta creado en "Views - configuracion - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function actualizar() {
        
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        
            $this->configuracion->whereIn('nomb_conf', ['tienda_nombre'])->set(['valor_conf' =>
            $this->request->getPost('tienda_nombre')])->update(); 

            $this->configuracion->whereIn('nomb_conf', ['tienda_rfc'])->set(['valor_conf' =>
            $this->request->getPost('tienda_rfc')])->update();

            $this->configuracion->whereIn('nomb_conf', ['tienda_fono1'])->set(['valor_conf' =>
            $this->request->getPost('tienda_fono1')])->update();

            $this->configuracion->whereIn('nomb_conf', ['tienda_fono2'])->set(['valor_conf' =>
            $this->request->getPost('tienda_fono2')])->update();

            $this->configuracion->whereIn('nomb_conf', ['tienda_email'])->set(['valor_conf' =>
            $this->request->getPost('tienda_email')])->update();

            $this->configuracion->whereIn('nomb_conf', ['tienda_direc1'])->set(['valor_conf' =>
            $this->request->getPost('tienda_direc1')])->update();

            $this->configuracion->whereIn('nomb_conf', ['ticket_leyenda'])->set(['valor_conf' =>
            $this->request->getPost('ticket_leyenda')])->update();
            
            //luego agregamos un retorno     
            return redirect()->to(base_url().'/configuracionContr');
        }else{
            //return $this->editar($this->request->getPost('id'),$this->validator);
        }


    }

    


}
