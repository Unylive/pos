<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->

      <?php if (isset($validation)) { ?>
        <div class="alert alert-danger">
          <?php echo $validation->ListErrors(); ?>
        </div>
      <?php } ?>
      <!-- AGREGAMOS UN FORMULARIO -->
      <!-- 1er paso un from despues un netodo despues un action -->
      <!-- "/unidades/insertar " es el action donde vamos a enviar el insertar -->
      <!-- para finalizar un autocomplete off para que no complete  el formulario -->
      <form method="POST" action="<?php echo base_url(); ?>/configuracionContr/actualizar" autocomplete="off">
        <?php csrf_Field(); ?>
        <!-- 2do paso agregamos un "div" -->
        <div class="form-group">
          <div class="row">
            <div class="col-12 col-sm-6">
              <!-- dentro de este div agregamos label -->
              <label>Nombre de la tienda</label>
              <input class="form-control" id="tienda_nombre" name="tienda_nombre" type="text" 
              value="<?php echo $nomb_conf['valor_conf'] ?>" autofocus required />
            </div>
            
            <div class="col-12 col-sm-6">
              <!-- dentro de este div agregamos label -->
              <label>Tienda FRC</label>
              <input class="form-control" id="tienda_rfc" name="tienda_rfc" type="text" 
              value="<?php echo $tienda_rfc['valor_conf'] ?>" required />
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-6">
              <!-- dentro de este div agregamos label -->
              <label>Telefono 1 Tienda</label>
              <input class="form-control" id="tienda_fono1" name="tienda_fono1" 
              type="text" value="<?php echo $tienda_fono1['valor_conf'] ?>" required />
            </div>
            
            <div class="col-12 col-sm-6">
              <!-- dentro de este div agregamos label -->
              <label>Telefono 2 Tienda</label>
              <input class="form-control" id="tienda_fono2" name="tienda_fono2" 
              type="text" value="<?php echo $tienda_fono2['valor_conf'] ?>" required />
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-6">
              <!-- dentro de este div agregamos label -->
              <label>Tienda Email</label>
              <input class="form-control" id="tienda_email" name="tienda_email" 
              type="text" value="<?php echo$tienda_email['valor_conf'] ?>" required />
            </div>
            
            <div class="col-12 col-sm-6">
              <!-- dentro de este div agregamos label -->
              <label>Tienda Dirección</label>
              <textarea class="form-control" id="tienda_direc1" name="tienda_direc1" 
              required><?php echo$tienda_direc1['valor_conf'] ?></textarea>
            </div>
          </div>

        </div>
        <a href="<?php echo base_url(); ?>/configuracionContr" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>

      </form>

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