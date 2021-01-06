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
            <!-- AGREGAMOS UN FORMULARIO -->
            <!-- 1er paso un from despues un netodo despues un action -->
            <!-- "/productos/insertar " es el action donde vamos a enviar el insertar -->
            <!-- para finalizar un autocomplete off para que no complete  el formulario -->
            <form method="POST" action="<?php echo base_url(); ?>/usuariosContr/insertar" autocomplete="off">
            
                <!-- 2do paso agregamos un "div" -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>No de Identificacion</label>
                            <input class="form-control" id="cod_user" name="cod_user" type="text" 
                            value="<?php echo set_Value('cod_user') ?>" autofocus required is_unique />
                        </div>
                        <div class="col-6 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Nombre Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text"
                            value="<?php echo set_Value('usuario') ?>" required />
                        </div>
                    </div>
                </div> 
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Contraseña</label>
                            <input class="form-control" id="password_user" name="password_user" type="password"
                            value="<?php echo set_Value('password_user') ?>" required />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Repite Contraseña</label>
                            <input class="form-control" id="repassword_user" name="repassword_user" type="password"
                            value="<?php echo set_Value('repassword_user') ?>" required />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Cargo</label>
                            <select class="form-control" id="Id_rol" name="Id_rol" required>
                                <option value="">Seleccionar Rol</option>
                                <?php foreach($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['nomb_rol']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Nombres</label>
                            <input class="form-control" id="nomb_user" name="nomb_user" type="text"
                            value="<?php echo set_Value('nomb_user') ?>" required />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Apellido</label>
                            <input class="form-control" id="apellido_user" name="apellido_user" type="text"
                            value="<?php echo set_Value('apellido_user') ?>" required />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Caja</label>
                            <select class="form-control" id="Id_caja" name="Id_caja" required>
                                <option value="">Seleccionar Caja</option>
                                <?php foreach($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id_caja']; ?>"><?php echo $caja['nomb_caja']; ?>
                                </option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Email</label>
                            <input class="form-control" id="email_user" name="email_user" type="text"
                            value="<?php echo set_Value('email_user') ?>" />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Telefono Fijo</label>
                            <input class="form-control" id="fono1_user" name="fono1_user" type="text"
                            value="<?php echo set_Value('fono1_user') ?>" />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Telefono Movil</label>
                            <input class="form-control" id="celu1_user" name="celu1_user" type="text"
                            value="<?php echo set_Value('celu1_user') ?>" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-9 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Calle Principal</label>
                            <input class="form-control" id="direc1_user" name="direc1_user" type="text"
                            value="<?php echo set_Value('direc1_user') ?>" />
                        </div>
                        <div class="col-3 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>No de casa / lote / otro</label>
                            <input class="form-control" id="ncasa_user" name="ncasa_user" type="text"
                            value="<?php echo set_Value('ncasa_user') ?>" />
                        </div>
                        <div class="col-9 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Interseccion</label>
                            <input class="form-control" id="direc2_user" name="direc2_user" type="text"
                            value="<?php echo set_Value('direc2_user') ?>" />
                        </div>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="row">
                        
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Referencia Direccion</label>
                            <input class="form-control" id="refer_user" name="refer_user" type="textarea"
                            value="<?php echo set_Value('refer_user') ?>" />
                        </div>
                        <div class="col-9 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Provincia</label>
                            <input class="form-control" id="provin_user" name="provin_user" type="text"
                            value="<?php echo set_Value('provin_user') ?>" />
                        </div>
                        <div class="col-6 col-sm-4"> <!-- dentro de este div agregamos label -->
                            <label>Ciudad</label>
                            <input class="form-control" id="ciudad_user" name="ciudad_user" type="text"
                            value="<?php echo set_Value('ciudad_user') ?>" />
                        </div>
                    </div>
                </div>
              
                                
                <a href="<?php echo base_url(); ?>/usuariosContr" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
        
            </form>
    
        </div>
    </main>