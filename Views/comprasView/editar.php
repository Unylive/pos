<!-- PARA VER O MOSTRAR ESTA VISTA AL USUARIO NECESITAMIS CREAR LA FUNCION EN EL CONTROLADOR -->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->
            <?php \Config\Services::validation()->ListErrors(); ?>
            <!-- AGREGAMOS UN FORMULARIO -->
            <!-- 1er paso un from despues un netodo despues un action -->
            <!-- "/productos/insertar " es el action donde vamos a enviar el insertar -->
            <!-- para finalizar un autocomplete off para que no complete  el formulario -->
            <form method="POST" action="<?php echo base_url(); ?>/productosContr/Actualizar" autocomplete="off">
            <?php csrf_Field(); ?>
                <!-- 2do paso agregamos un "div" -->
                <input type="hidden" id="id_prod" name="id_prod" value="<?php echo $producto['id_prod']; ?>" />
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Codigo</label>
                            <input class="form-control" id="cod_prod" name="cod_prod" type="text" value="<?php echo $producto['cod_prod']; ?>" autofocus require />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Nombre Producto</label>
                            <input class="form-control" id="nomb_prod" name="nomb_prod" type="text" value="<?php echo $producto['nomb_prod']; ?>" require />
                        </div>
                    </div>
                </div> 
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Precio de Venta</label>
                            <input class="form-control" id="precio_vnta" name="precio_vnta" type="text" value="<?php echo $producto['precio_vnta']; ?>" require />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Precio De Compra</label>
                            <input class="form-control" id="precio_comp" name="precio_comp" type="text" value="<?php echo $producto['precio_comp']; ?>"require />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Unidad</label>
                            <select class="form-control" id="id_unidad" name="id_unidad" required>
                                <option value="">Seleccionar Unidad</option>
                                <?php foreach($unidades as $unidad) { ?>
                                    <option value="<?php echo $unidad['id']; ?>" <?php if($unidad['id'] == 
                                    $producto['id_unidad']){ echo 'selected'; } ?>><?php echo $unidad
                                    ['nombre']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Categoria</label>
                            <select class="form-control" id="id_categ" name="id_categ" required>
                                <option value="">Seleccionar Categoria</option>
                                <?php foreach($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['Id']; ?>" <?php if($categoria['Id'] == 
                                    $producto['id_categ']){ echo 'selected'; }?>><?php echo $categoria['nomb_categ']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Stock Minimo</label>
                            <input class="form-control" id="stock_mini" name="stock_mini" type="text" 
                            value="<?php echo $producto['stock_mini']; ?>" require />
                        </div>
                        <div class="col-12 col-sm-6"> <!-- dentro de este div agregamos label -->
                            <label>Es Inventariable</label>
                            <select id="invent_prod" name="invent_prod" class="form-control">
                                <option value="1" <?php if($producto['invent_prod'] == 1){ echo 'selected'; }?>>Si</option>
                                <option value="0" <?php if($producto['invent_prod'] == 0){ echo 'selected'; }?>>No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <a href="<?php echo base_url(); ?>/productosContr" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
        
            </form>
    
        </div>
    </main>