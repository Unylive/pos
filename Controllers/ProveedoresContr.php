<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProveedoresModel;
//use App\Models\CategoriasModel;
//use App\Models\UnidadesModel;

class ProveedoresContr extends BaseController
{

    protected $proveedores;
    protected $reglas;

    public function __construct()
    {

        $this->proveedores = new ProveedoresModel();
        //$this->unidades = new UnidadesModel();
        //$this->categorias = new CategoriasModel();

        helper(['form']); //esto es para trabajar correctamente con el formulario

        $this->reglas = [
            'cod_prov' => [
                'rules' => 'required|is_unique[proveedores.cod_prov]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} ya existe.'
                ]
            ],
            'nomb_prov' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ]
        ];
    }

    public function index($activo = 1)
    {

        $proveedores = $this->proveedores->where('activo_prov', $activo)->findall();
        $data = ['titulo' => 'Proveedores', 'datos' => $proveedores];

        echo view('header');
        echo view('proveedoresView/proveedores', $data);
        echo view('footer_piepg');
    }

    //FUNCION PARA LA VISTA NUEVO UNIDAD 
    public function nuevo()
    {

        $data = ['titulo' => 'Agregar Proveedor' ];

        echo view('header');
        echo view('proveedoresView/nuevo', $data);
        echo view('footer_piepg');
    }

    //EL METODO SE DEBE LLANMAR INSERTAR SEGUN EL ARCHIVO "nuevo.php"
    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->proveedores->save([
                'cod_prov' => $this->request->getPost('cod_prov'),
                'nomb_prov' => $this->request->getPost('nomb_prov'),
                'direc_prov' => $this->request->getPost('direc_prov'),
                'refdirec_prov' => $this->request->getPost('refdirec_prov'),
                'fono1_prov' => $this->request->getPost('fono1_prov'),
                'celu1_prov' => $this->request->getPost('celu1_prov'),
                'contact_prov' => $this->request->getPost('contact_prov'),
                'ciudad_prov' => $this->request->getPost('ciudad_prov'),
                'provincia_prov' => $this->request->getPost('provincia_prov'),
                'email_prov' => $this->request->getPost('email_prov'),
                
            ]);

            //luego agregamos un retorno - redireccionando    
            return redirect()->to(base_url() . '/proveedoresContr');
        } else {
            //si no se cumple la sentencia nuevamente imprimimos el formulario
            //adisionamos validation => validator con esto devuelve la validaciones que no se cumplieron
            
            //$unidades = $this->unidades->where('activo', 1)->findall();
            //$categorias = $this->categorias->where('activo', 1)->findall();

            //$data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias,
            //'validation' => $this->validator];
           

            echo view('header');
            echo view('proveedoresView/nuevo', $data);
            echo view('footer_piepg');
        }
    }


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

    public function editar($id)
    {

        
        $proveedor = $this->proveedores->where('id_prov', $id)->first();
        $data = [
            'titulo' => 'Editar Proveedor', 'proveedor' => $proveedor
        ];

        echo view('header');
        echo view('proveedoresView/editar', $data);
        echo view('footer_piepg');
    }

    //el archivo editar esta creado en "Views - proveedores - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function actualizar()
    {

        //recivimos el id como oculto
        $this->proveedores->update($this->request->getPost('id_prov'), [
            'cod_prov' => $this->request->getPost('cod_prov'),
            'nomb_prov' => $this->request->getPost('nomb_prov'),
            'direc_prov' => $this->request->getPost('direc_prov'),
            'refdirec_prov' => $this->request->getPost('refdirec_prov'),
            'fono1_prov' => $this->request->getPost('fono1_prov'),
            'celu1_prov' => $this->request->getPost('celu1_prov'),
            'contact_prov' => $this->request->getPost('contact_prov'),
            'ciudad_prov' => $this->request->getPost('ciudad_prov'),
            'provincia_prov' => $this->request->getPost('provincia_prov'),
            'email_prov' => $this->request->getPost('email_prov'),
        ]);

        //luego agregamos un retorno - redireccionando    
        return redirect()->to(base_url() . '/proveedoresContr');
    }

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function eliminar($id) {

        $this->proveedores->update($id, ['activo_prov' => 0]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/proveedoresContr');
    }

    public function eliminados($activo = 0)
    {

        $proveedores = $this->proveedores->where('activo_prov', $activo)->findall();
        $data = ['titulo' => 'Proveedor Eliminadas', 'datos' => $proveedores];

        echo view('header');
        echo view('proveedoresView/eliminados', $data); //llama a la vista
        echo view('footer_piepg');
    }

    public function reingresar($id)
    {

        $this->proveedores->update($id, ['activo_prov' => 1]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/proveedoresContr');
    }

    public function buscarPorCodigo($codigo){
        $this->proveedores->select('*');
        $this->proveedores->where('cod_prov', $codigo);
        $this->proveedores->where('activo_prov', 1);
        
        $datos = $this->proveedores->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if($datos){
            $res['datos'] = $datos;
            $res['existe'] = true;
        }else{
            $res['error'] = 'No existe el Provedor';
            $res['existe'] = false;
        }
        echo json_encode($res);
    }
}
