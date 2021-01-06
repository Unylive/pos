<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
//use App\Models\CategoriasModel;
//use App\Models\UnidadesModel;

class ClientesContr extends BaseController
{

    protected $clientes;
    protected $reglas;

    public function __construct()
    {

        $this->clientes = new ClientesModel();
        //$this->unidades = new UnidadesModel();
        //$this->categorias = new CategoriasModel();

        helper(['form']); //esto es para trabajar correctamente con el formulario

        $this->reglas = [
            'cod_clt' => [
                'rules' => 'required|is_unique[clientes.cod_clt]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} ya existe.'
                ]
            ],
            'nomb_clt' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ]
        ];
    }

    public function index($activo = 1)
    {

        $clientes = $this->clientes->where('activo_clt', $activo)->findall();
        $data = ['titulo' => 'Clientes', 'datos' => $clientes];

        echo view('header');
        echo view('clientesView/clientes', $data);
        echo view('footer_piepg');
    }

    //FUNCION PARA LA VISTA NUEVO UNIDAD 
    public function nuevo()
    {

        $data = ['titulo' => 'Agregar Cliente' ];

        echo view('header');
        echo view('clientesView/nuevo', $data);
        echo view('footer_piepg');
    }

    //EL METODO SE DEBE LLANMAR INSERTAR SEGUN EL ARCHIVO "nuevo.php"
    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->clientes->save([
                'cod_clt' => $this->request->getPost('cod_clt'),
                'nomb_clt' => $this->request->getPost('nomb_clt'),
                'direc_clt' => $this->request->getPost('direc_clt'),
                'fono1_clt' => $this->request->getPost('fono1_clt'),
                'celu1_clt' => $this->request->getPost('celu1_clt'),
                'email_clt' => $this->request->getPost('email_clt'),
                
            ]);

            //luego agregamos un retorno - redireccionando    
            return redirect()->to(base_url() . '/clientesContr');
        } else {
            //si no se cumple la sentencia nuevamente imprimimos el formulario
            //adisionamos validation => validator con esto devuelve la validaciones que no se cumplieron
            
            //$unidades = $this->unidades->where('activo', 1)->findall();
            //$categorias = $this->categorias->where('activo', 1)->findall();

            //$data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias,
            //'validation' => $this->validator];
           

            echo view('header');
            echo view('clientesView/nuevo', $data);
            echo view('footer_piepg');
        }
    }


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

    public function editar($id)
    {

        
        $cliente = $this->clientes->where('id_clt', $id)->first();
        $data = [
            'titulo' => 'Editar Cliente', 'cliente' => $cliente
        ];

        echo view('header');
        echo view('clientesView/editar', $data);
        echo view('footer_piepg');
    }

    //el archivo editar esta creado en "Views - clientes - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function actualizar()
    {

        //recivimos el id como oculto
        $this->clientes->update($this->request->getPost('id_clt'), [
                'cod_clt' => $this->request->getPost('cod_clt'),
                'nomb_clt' => $this->request->getPost('nomb_clt'),
                'direc_clt' => $this->request->getPost('direc_clt'),
                'fono1_clt' => $this->request->getPost('fono1_clt'),
                'celu1_clt' => $this->request->getPost('celu1_clt'),
                'email_clt' => $this->request->getPost('email_clt'),
        ]);

        //luego agregamos un retorno - redireccionando    
        return redirect()->to(base_url() . '/clientesContr');
    }

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function eliminar($id)
    {

        $this->clientes->update($id, ['activo_clt' => 0]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/clientesContr');
    }

    public function eliminados($activo = 0)
    {

        $clientes = $this->clientes->where('activo_clt', $activo)->findall();
        $data = ['titulo' => 'Clentes Eliminadas', 'datos' => $clientes];

        echo view('header');
        echo view('clientesView/eliminados', $data); //llama a la vista
        echo view('footer_piepg');
    }

    public function reingresar($id)
    {

        $this->clientes->update($id, ['activo_clt' => 1]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/clientesContr');
    }
}
