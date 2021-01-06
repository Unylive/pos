<!-- PARA VER O MOSTRAR ESTA VISTA AL USUARIO NECESITAMIS CREAR LA FUNCION EN EL CONTROLADOR -->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->
            
            <?php if(isset($validation)){ ?>
                <div class="alert alert-danger">
            <?php echo $validation->ListErrors(); ?>
                </div>
            <?php } ?>
            
            <form method="POST" action="<?php echo base_url(); ?>/usuariosContr/Actualizar" autocomplete="off">
            <?php csrf_Field(); ?>
                <!-- 2do paso agregamos un "div" -->
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $usuario['id_user']; ?>" />
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Codigo</label>
                            <input class="form-control" id="cod_user" name="cod_user" type="text" value="<?php echo $usuario['cod_user']; ?>" autofocus required />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $usuario['usuario']; ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                    <div class="col-6 col-sm-3"> <!-- dentro de este div agregamos label -->
                            <label>Nombre</label>
                            <input class="form-control" id="nomb_user" name="nomb_user" type="text" value="<?php echo $usuario['nomb_user']; ?>" required />
                        </div>
                        <div class="col-6 col-sm-3"> <!-- dentro de este div agregamos label -->
                            <label>Apellido</label>
                            <input class="form-control" id="apellido_user" name="apellido_user" type="text" value="<?php echo $usuario['apellido_user']; ?>" required />
                        </div>
                        <div class="col-6 col-sm-3"> <!-- dentro de este div agregamos label -->
                        <label>cargo</label>
                            <select class="form-control" id="Id_rol" name="Id_rol" required>
                                <option value="">Seleccionar Cargo</option>
                                <?php foreach($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id_rol']; ?>" <?php if($rol['id_rol'] == 
                                    $usuario['Id_rol']){ echo 'selected'; } ?>><?php echo $rol['nomb_rol']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 col-sm-3"> <!-- dentro de este div agregamos label -->
                            <label>Caja</label>
                            <select class="form-control" id="Id_caja" name="Id_caja" required>
                                <option value="">Seleccionar Caja</option>
                                <?php foreach($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id_caja']; ?>" <?php if($caja['id_caja'] == 
                                    $usuario['Id_caja']){ echo 'selected'; }?>><?php echo $caja['nomb_caja']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                       
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Email</label>
                            <input class="form-control" id="email_user" name="email_user" type="text" value="<?php echo $usuario['email_user']; ?>" />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Telefono Fijo</label>
                            <input class="form-control" id="fono1_user" name="fono1_user" type="text" value="<?php echo $usuario['fono1_user']; ?>" />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Telefono Movil</label>
                            <input class="form-control" id="celu1_user" name="celu1_user" type="text" value="<?php echo $usuario['celu1_user']; ?>" />
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                    <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Calle Principal</label>
                            <input class="form-control" id="direc1_user" name="direc1_user" type="text" value="<?php echo $usuario['direc1_user']; ?>" />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Numero</label>
                            <input class="form-control" id="ncasa_user" name="ncasa_user" type="text" value="<?php echo $usuario['ncasa_user']; ?>" />
                        </div>

                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Interseccion</label>
                            <input class="form-control" id="direc2_user" name="direc2_user" type="text" value="<?php echo $usuario['direc2_user']; ?>" />
                        </div>
                                                
                        
                    </div>
                </div>

               
                <div class="form-group">
                    <div class="row">
                    <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Estado / Provincia</label>
                            <input class="form-control" id="provin_user" name="provin_user" type="text" value="<?php echo $usuario['provin_user']; ?>" />
                        </div>
                    
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Ciudad</label>
                            <input class="form-control" id="ciudad_user" name="ciudad_user" type="text" value="<?php echo $usuario['ciudad_user']; ?>" />
                        </div>
                        
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Referencia Direccion</label>
                            <input class="form-control" id="refer_user" name="refer_user" type="text" value="<?php echo $usuario['refer_user']; ?>" />
                        </div>
                    </div>
                </div>


                <a href="<?php echo base_url(); ?>/usuariosContr" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
        
            </form>
    
        </div>
    </main>