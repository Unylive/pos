<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajasModel;
use App\Models\RolesModel;

class UsuariosContr extends BaseController
{

    protected $usuarios, $cajas, $roles;
    protected $reglas, $reglasLogin, $reglasCambia;

    public function __construct()
    {

        $this->usuarios = new UsuariosModel();
        $this->cajas = new CajasModel();
        $this->roles = new RolesModel();

        helper(['form']); //esto es para trabajar correctamente con el formulario

        $this->reglas = [
            'cod_user' => [
                'rules' => 'required|is_unique[usuarios.cod_user]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} ya existe.'
                ]
            ],
            'usuario' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'password_user' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'repassword_user' => [
                'rules' => 'required|matches[password_user]',
                'errors' => [
                            'required' => 'El campo {field} es obligatorio.',
                             'matches' => 'Las contraseñas no coinciden.'] 
            ],
            'nomb_user' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'Id_caja' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'Id_rol' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ]
        ];

        $this->reglasLogin = [
            'usuario' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'password_user' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],

        ];

        $this->reglasCambia = [
            'password_user' => [
                'rules' => 'required',
                'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'repassword_user' => [
                'rules' => 'required|matches[password_user]',
                'errors' => ['required' => 'El campo {field} es obligatorio.', 
                             'matches' => 'Las contraseñas no coinciden.'] 
            ],

        ];
    }

    public function index($activo = 1) {

        $usuarios = $this->usuarios->where('activo_user', $activo)->findall();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

        echo view('header');
        echo view('usuariosView/usuarios', $data);
        echo view('footer_piepg');
    }

    //FUNCION PARA LA VISTA NUEVO UNIDAD 
    public function nuevo(){

        $cajas = $this->cajas->where('activo_caja', 1)->findall();
        $roles = $this->roles->where('activo_rol', 1)->findall();
        
        $data = ['titulo' => 'Agregar Usuario', 'cajas' => $cajas, 'roles' => $roles ];

        echo view('header');
        echo view('usuariosView/nuevo', $data);
        echo view('footer_piepg');
    }

    //EL METODO SE DEBE LLANMAR INSERTAR SEGUN EL ARCHIVO "nuevo.php"
    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('password_user'), PASSWORD_DEFAULT);
            $this->usuarios->save([
                'cod_user' => $this->request->getPost('cod_user'),
                'usuario' => $this->request->getPost('usuario'),
                'password_user' => $hash,
                'nomb_user' => $this->request->getPost('nomb_user'),
                'apellido_user' => $this->request->getPost('apellido_user'),
                'direc1_user' => $this->request->getPost('direc1_user'),
                'ncasa_user' => $this->request->getPost('ncasa_user'),
                'direc2_user' => $this->request->getPost('direc2_user'),
                'refer_user' => $this->request->getPost('refer_user'),
                'provin_user' => $this->request->getPost('provin_user'),
                'ciudad_user' => $this->request->getPost('ciudad_user'),
                'email_user' => $this->request->getPost('email_user'),
                'fono1_user' => $this->request->getPost('fono1_user'),
                'celu1_user' => $this->request->getPost('celu1_user'),
                'Id_caja' => $this->request->getPost('Id_caja'),
                'Id_rol' => $this->request->getPost('Id_rol'),

                'activo_user' => 1
                
            ]);

            //luego agregamos un retorno - redireccionando    
            return redirect()->to(base_url() . '/usuariosContr');
        } else {
            //si no se cumple la sentencia nuevamente imprimimos el formulario
            //adisionamos validation => validator con esto devuelve la validaciones que no se cumplieron
            
            $cajas = $this->cajas->where('activo_caja', 1)->findall();
            $roles = $this->roles->where('activo_rol', 1)->findall();
            $data = ['titulo' => 'Agregar Usuario', 'cajas' => $cajas, 'roles' => $roles,
            'validation' => $this->validator];
           

            echo view('header');
            echo view('usuariosView/nuevo', $data);
            echo view('footer_piepg');
        }
    }


    //Nos debe traer la consulta que vamos a editar, la variable seria "unidad" 
    //el where seria id, pero buscamos el primer registro con "first()" y el metodo editar recibe id 

    public function editar($id)
    {

        $roles = $this->roles->where('activo_rol', 1)->findall();
        $cajas = $this->cajas->where('activo_caja', 1)->findall();
        $usuario = $this->usuarios->where('id_user', $id)->first();
        $data = [
            'titulo' => 'Editar Usuarios', 'roles' => $roles, 'cajas' => $cajas,
            'usuario' => $usuario
        ];

        echo view('header');
        echo view('usuariosView/editar', $data);
        echo view('footer_piepg');
    }

    //el archivo editar esta creado en "Views - usuarios - editar.php"

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function actualizar()
    {

        //recivimos el id como oculto
        $this->usuarios->update($this->request->getPost('id_user'), [
            'cod_user' => $this->request->getPost('cod_user'),
            'usuario' => $this->request->getPost('usuario'),
            //'password_user' => $hash,
            'nomb_user' => $this->request->getPost('nomb_user'),
            'apellido_user' => $this->request->getPost('apellido_user'),
            'direc1_user' => $this->request->getPost('direc1_user'),
            'ncasa_user' => $this->request->getPost('ncasa_user'),
            'direc2_user' => $this->request->getPost('direc2_user'),
            'refer_user' => $this->request->getPost('refer_user'),
            'provin_user' => $this->request->getPost('provin_user'),
            'ciudad_user' => $this->request->getPost('ciudad_user'),
            'email_user' => $this->request->getPost('email_user'),
            'fono1_user' => $this->request->getPost('fono1_user'),
            'celu1_user' => $this->request->getPost('celu1_user'),
            'Id_caja' => $this->request->getPost('Id_caja'),
            'Id_rol' => $this->request->getPost('Id_rol'),
            'activo_user' => 1
        ]);

        //luego agregamos un retorno - redireccionando    
        return redirect()->to(base_url() . '/usuariosContr');
    }

    //EL METODO SE DEBE LLANMAR actualizar SEGUN EL ARCHIVO "editar.php"
    public function eliminar($id)
    {

        $this->usuarios->update($id, ['activo_user' => 0]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/usuariosContr');
    }

    public function eliminados($activo = 0)
    {

        $usuarios = $this->usuarios->where('activo_user', $activo)->findall();
        $data = ['titulo' => 'Usuarios Eliminados', 'datos' => $usuarios];

        echo view('header');
        echo view('usuariosView/eliminados', $data); //llama a la vista
        echo view('footer_piepg');
    }

    public function reingresar($id)
    {

        $this->usuarios->update($id, ['activo_user' => 1]);

        //luego agregamos un retorno     
        return redirect()->to(base_url() . '/usuariosContr');
    }

    public function login(){
        echo view('login');
    }

    public function valida(){
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
            //ya puestas las reglas traemos por el medotoPost los datos
            $usuario = $this->request->getPost('usuario');
            $password_user = $this->request->getPost('password_user');
            //ahora hacemos una consulta a la BBDD llamada "usuarios" para traer el reistro que contenga el nombre de usuario
            //y de esto solo traeme el 1er registro "first()"
            $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();

            if($datosUsuario != null){ //si datosUsuario es diferente a null significa que si trae informacio
                if(password_verify($password_user, $datosUsuario['password_user'])){
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id_user'],
                        'cod_user' => $datosUsuario['cod_user'],
                        'nomb_user' => $datosUsuario['nomb_user'],
                        'id_caja' => $datosUsuario['Id_caja'],
                        'id_rol' => $datosUsuario['Id_rol'],
                    ];

                    $inicSession = session();
                    $inicSession->set($datosSesion);
                    return redirect()->to(base_url(). '/configuracionContr');
                }else{
                    $data['error'] = "Contraseña Incorrecta";
                    echo view('login', $data);
                }
            } else{
                $data['error'] = "El Usuario no existe";
                echo view('login', $data);
            }

        }else{
            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
        
    }

    public function logout(){

        $session = session();
        $session->destroy(); //eliminamos todo el codigo
        return redirect()->to(base_url());    
    }

    public function cambia_password(){

        $session = session();
        $usuario = $this->usuarios->where('id_user', $session->id_usuario)->first();
        $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario];

        echo view('header');
        echo view('usuariosView/cambia_password', $data);
        echo view('footer_piepg');

    }

    public function actualizar_password(){

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $session = session();
            $idUsuario = $session->id_usuario;
            $hash = password_hash($this->request->getPost('password_user'), PASSWORD_DEFAULT);
            $this->usuarios->update($idUsuario, ['password_user' => $hash]);

            //luego agregamos un retorno - redireccionando    
            $usuario = $this->usuarios->where('id_user', $session->id_usuario)->first();
            $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario, 'mensaje' => 
            'contraseña Actualizada'];

            echo view('header');
            echo view('usuariosView/cambia_password', $data);
            echo view('footer_piepg');
        } else {
            //si no se cumple la sentencia nuevamente imprimimos el formulario
            //adisionamos validation => validator con esto devuelve la validaciones que no se cumplieron
            
            $session = session();
            $usuario = $this->usuarios->where('id_user', $session->id_usuario)->first();
            $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario, 'validation' => $this->validator];

            echo view('header');
            echo view('usuariosView/cambia_password', $data);
            echo view('footer_piepg');
        }
    }
}
