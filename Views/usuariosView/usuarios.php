<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->
            <?php \Config\Services::validation()->listErrors(); ?>
            <!-- VAMOS A AGREGAR UN BOTON DENTRO UN DIV - DENTRO DE UN UN PARRAFO -->
            <div>
            <!-- tenemos que crear el metodo en el controlador para que lo reconosca -->    
            <!-- a los botones agregamos el diseño con "class" -->
                <p>
                    <a href="<?php echo base_url(); ?>/usuariosContr/nuevo" class="btn btn-info">Agregar</a>
                    <a href="<?php echo base_url(); ?>/usuariosContr/eliminados" class="btn btn-warning">Eliminados</a>
                </p>

            </div>
            <div class="table-responsive">
                <!-- DISEÑO RESPONSIVO -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- NOMBRE DE LAS COLUMNAS -->
                            <th>Id</th>
                            <th>No ID</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Caja</th>
                            <th></th>
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
                                <td><?php echo $dato['id_user']; ?></td>
                                <td><?php echo $dato['cod_user']; ?></td>
                                <td><?php echo $dato['usuario']; ?></td>
                                <td><?php echo $dato['nomb_user']; ?></td>
                                <td><?php echo $dato['Id_rol']; ?></td>
                                <td><?php echo $dato['Id_caja']; ?></td>

                                <td><a href="<?php echo base_url(). '/usuariosContr/editar/' .  $dato['id_user']; ?>" 
                                class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                                
                                
                                <td><a href="#" data-href="<?php echo base_url(). '/usuariosContr/eliminar/' . $dato['id_user']; ?>" 
                                data-toggle="modal" data-target="#modal-confirma" data.placement="top" 
                                title="Eliminar Registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </main>

<!-- Modal -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Deseas Eliminar este Registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a class="btn btn-primary btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>