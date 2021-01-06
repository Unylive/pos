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
            <!-- "/unidades/insertar " es el action donde vamos a enviar el insertar -->
            <!-- para finalizar un autocomplete off para que no complete  el formulario -->
            <form method="POST" action="<?php echo base_url(); ?>/unidades/insertar" autocomplete="off">
            <?php csrf_Field(); ?>
                <!-- 2do paso agregamos un "div" -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" 
                            value="<?php echo set_value('nombre') ?>" autofocus required />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Nombre Corto</label>
                            <input class="form-control" id="nombre_corto" name="nombre_corto" type="text" 
                            value="<?php echo set_value('nombre_corto') ?>" required />
                        </div>
                    </div>
                </div>    
                <a href="<?php echo base_url(); ?>/unidades" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
        
            </form>
    
        </div>
    </main>