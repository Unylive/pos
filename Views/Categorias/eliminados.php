<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->
            <!-- VAMOS A AGREGAR UN BOTON DENTRO UN DIV - DENTRO DE UN UN PARRAFO -->
            <div>
            <!-- tenemos que crear el metodo en el controlador para que lo reconosca -->    
            <!-- a los botones agregamos el diseño con "class" -->
                <p>
                    <a href="<?php echo base_url(); ?>/categoriasContr" class="btn btn-warning">Volver a Unidades</a>
                </p>

            </div>
            <div class="table-responsive">
                <!-- DISEÑO RESPONSIVO -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- NOMBRE DE LAS COLUMNAS -->
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- NOTA: EN EL CONTROLADOR ESTAMOS ENVIANDO UNA VARIABLE datos QUE CONTIENE
                            LOS DATOS DE LA CONSULTA DE LA TABLA CUANDO ESTOS SEN ACTIVOS-->
                        <!-- VAMOS A CREAR LAS FILAS O DATOS DE FORMA DINAMICA CON UN foreach() DONDE
                            COLOCAMOS LA VARIABLE datos -->

                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['Id']; ?></td>
                                <td><?php echo $dato['nomb_categ']; ?></td>
                                
                                <td><a href="<?php echo base_url(). '/categoriasContr/reingresar/' .  $dato['Id']; ?>" 
                                class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                                
                             </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </main>