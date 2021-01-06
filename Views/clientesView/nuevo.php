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
            <form method="POST" action="<?php echo base_url(); ?>/clientesContr/insertar" autocomplete="off">
            
                <!-- 2do paso agregamos un "div" -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Codigo</label>
                            <input class="form-control" id="cod_clt" name="cod_clt" type="text" autofocus required is_unique />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Nombre Cliente</label>
                            <input class="form-control" id="nomb_clt" name="nomb_clt" type="text" required />
                        </div>
                    </div>
                </div> 
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Direccion Cliente</label>
                            <input class="form-control" id="direc_clt" name="direc_clt" type="text" required />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Telefono Fijo</label>
                            <input class="form-control" id="fono1_clt" name="fono1_clt" type="text" required />
                        </div>
                    </div>
                </div>
                
                
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Telefono Celular </label>
                            <input class="form-control" id="celu1_clt" name="celu1_clt" type="text" required />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>email</label>
                            <input class="form-control" id="email_clt" name="email_clt" type="text" required />
                        </div>
                        <!--
                        <div class="col-12 col-sm-6"> 
                            <label>email</label>
                            <select id="email_clt" name="email_clt" class="form-control">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>-->
                    </div>
                </div>

                <a href="<?php echo base_url(); ?>/clientesContr" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
        
            </form>
    
        </div>
    </main>