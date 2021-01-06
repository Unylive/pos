<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->
      <!-- VAMOS A AGREGAR UN BOTON DENTRO UN DIV - DENTRO DE UN UN PARRAFO -->
      <div>
        <!-- tenemos que crear el metodo en el controlador para que lo reconosca -->
        <!-- a los botones agregamos el diseño con "class" -->
        <p>
          <a href="<?php echo base_url(); ?>/clientesContr" class="btn btn-warning">Volver a Clientes</a>
        </p>

      </div>
      <div class="table-responsive">
        <!-- DISEÑO RESPONSIVO -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <!-- NOMBRE DE LAS COLUMNAS -->
              <th>Id</th>
              <th>Codigo / N-ID</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono Fijo</th>
              <th>Telefono Celular</th>
              <th>Email</th>
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
                td>
                <td><?php echo $dato['id_clt']; ?></td>
                <td><?php echo $dato['cod_clt']; ?></td>
                <td><?php echo $dato['nomb_clt']; ?></td>
                <td><?php echo $dato['direc_clt']; ?></td>
                <td><?php echo $dato['fono1_clt']; ?></td>
                <td><?php echo $dato['celu1_clt']; ?></td>
                <td><?php echo $dato['email_clt']; ?></td>

                <td><a href="#" data-href="<?php echo base_url() . '/clientesContr/reingresar/' . 
                $dato['id_clt']; ?>" data-toggle="modal" data-target="#modal-confirma" data.placement="top" 
                title="Reingresar Registro" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i></a></td>

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
          <h5 class="modal-title" id="exampleModalLabel">Reingresar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Deseas Reingresar este Registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <a class="btn btn-primary btn-ok">Si</a>
        </div>
      </div>
    </div>
  </div>