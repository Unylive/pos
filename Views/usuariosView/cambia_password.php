<!-- PARA VER O MOSTRAR ESTA VISTA AL USUARIO NECESITAMIS CREAR LA FUNCION EN EL CONTROLADOR -->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4"><?php echo $titulo; ?></h3> <!-- aqui estamos reciviendo la variable $titulo desde el controlador -->
            <?php \Config\Services::validation()->ListErrors(); ?>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <?php if (isset($error)) { ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php } ?>


            <form method="POST" action="<?php echo base_url(); ?>/usuariosContr/actualizar_password" autocomplete="off">
                <!-- 2do paso agregamos un "div" -->

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <!-- dentro de este div agregamos label -->
                            <label>Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $usuario['usuario']; ?>" disabled />
                        </div>
                        <div class="col-12 col-sm-6">
                            <!-- dentro de este div agregamos label -->
                            <label>Nombre Usuario</label>
                            <input class="form-control" id="nomb_user" name="nomb_user" type="text" value="<?php echo $usuario['nomb_user']; ?>" disabled />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <!-- dentro de este div agregamos label -->
                            <label>contraseña</label>
                            <input class="form-control" id="password_user" name="password_user" type="password" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <!-- dentro de este div agregamos label -->
                            <label>Confirma Contraseña</label>
                            <input class="form-control" id="repassword_user" name="repassword_user" type="password" required />
                        </div>
                    </div>
                </div>

                <a href="<?php echo base_url(); ?>/usuariosContr" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>

                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-success">
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>

                <?php if (isset($error)) { ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
                <?php } ?>

            </form>

        </div>
    </main>