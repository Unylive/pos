<?php
$user_session = session();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>POS - DEMO - SERCONSIS</title>
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" /> <!-- ALOS ESTILOS AGREGAMOS LA base_url() -->
    <link href="<?php echo base_url(); ?>/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/js/all.min.js"></script> <!-- ALOS SCRIPT TAMBIEN AGREGAMOS LA base_url() -->
    
    <script src="<?php echo base_url(); ?>/js/jquery-3.5.1.js" ></script>
    
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">POS - DEMO - SERCONSIS </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo 
                $user_session->nomb_user; ?><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>/UsuariosContr/cambia_password">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>/UsuariosContr/logout">Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <!--<div class="sb-sidenav-menu-heading">Interface</div>-->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                        data-target="#menuProductos" aria-expanded="false" aria-controls="menuProductos">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                            Productos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuProductos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url(); ?>/productosContr">Productos</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/unidades">Unidades</a> <!--ESTA URL VA DIRECCIONADA A unidades -->
                                <a class="nav-link" href="<?php echo base_url(); ?>/categoriasContr">Categorias</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                        data-target="#menuProveedores" aria-expanded="false" aria-controls="menuProveedores">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Proveedores
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuProveedores" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url(); ?>/ProveedoresContr">Proveedores</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                        data-target="#menuClientes" aria-expanded="false" aria-controls="menuClientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuClientes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url(); ?>/ClientesContr">Clientes</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                        data-target="#menuCompras" aria-expanded="false" aria-controls="menuCompras">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                            Compras
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuCompras" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url(); ?>/ComprasContr/nuevo">Nueva Compra</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/ComprasContr">Compras</a> <!--ESTA URL VA DIRECCIONADA A unidades -->
                                
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                        data-target="#despliegaAdmi" aria-expanded="false" aria-controls="despliegaAdmi">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                            Administracion
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="despliegaAdmi" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url(); ?>/ConfiguracionContr">Configuracion</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/UsuariosContr">Usuarios</a> <!--ESTA URL VA DIRECCIONADA A unidades -->
                                <a class="nav-link" href="<?php echo base_url(); ?>/categoriasContr">Roles</a>
                            </nav>
                        </div>

                        

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>

       