<?php
$id_compra = uniqid();
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid"> 
            <h4 class="mt-2"><?php echo $titulo; ?></h4>

            <form method="POST" action="<?php echo base_url(); ?>/comprasContr/guarda" autocomplete="off">
                <!-- 2do paso agregamos un "div" -->

                <div class="form-group"> <!-- dts comprobante y por que -->
                    <div class="row">

                        <div class="col-12 col-sm-5">
                            <label style="color:blue">Concepto Compra</label>
                            <textarea class="form-control" id="concepto_comp" name="concepto_comp" ></textarea>
                        </div>

                        <div class="col-12 col-sm-3">  <!--<label>Tipo de Comprobante</label>-->
                        <label>Tipo de Comprobante</label>
                            <select class="form-control" id="id_tpcomp" name="id_tpcomp" >
                                <option value="">Tipo de Comprobante</option>
                                <?php foreach ($tipocomprobantes as $tipocomprobante) { ?>
                                    <option value="<?php echo $tipocomprobante['id_tpcomp']; ?>"><?php echo $tipocomprobante['cod_tpcomprobante']; ?>
                                        <?php echo $tipocomprobante['nomb_tpcomprobante']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-1"> <!-- dentro de este div agregamos label -->
                            <label style = "font-size: 14px" >No Serie 1</label>
                            <input class="form-control" id="nserie1_comp" name="nserie1_comp" type="text" 
                            placeholder="Ingrese serie 1 - eje. 001" />
                        </div>

                        <div class="col-12 col-sm-1"> <!-- dentro de este div agregamos label -->
                            <label style = "font-size: 14px">No Serie 2</label>
                            <input class="form-control" id="nserie2_comp" name="nserie2_comp" type="text" 
                            placeholder="Ingrese serie 2 - eje. 001" />
                        </div>

                        <div class="col-12 col-sm-2">
                            <label>No de Secuencial</label>
                            <input class="form-control" id="concepto_comp" name="concepto_comp" type="text" style="color:red" />
                        </div>
                    </div>
                </div>

                <!-- dts proveedor -->

                <div class="form-group"> <!-- dts proveedor -->
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <input type="hidden" id="id_proveedor" name="id_proveedor" />
                            <label>Codigo - Proveedor</label>
                            <input class="form-control" id="codigo_prov" name="codigo_prov" type="text" 
                            placeholder="Ingrese codigo Proveedor y press enter" onkeyup="buscarProveedor(event, this, this.value)" 
                            autofocus required />
                            <label for="codigo_prov" id="resultado_error" style="color: red"></label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <label>Nombre del Proveedor</label>
                            <input class="form-control" id="nomb_prov" name="nomb_prov" type="text" disabled />
                        </div>
                        <!--<div class="col-12 col-sm-4">
                            <label>Concepto Compra</label>
                            <textarea class="form-control" id="concepto_comp" name="concepto_comp" required></textarea>
                        </div>-->
                        
                    </div>
                </div>

                               
                <!-- dts producto -->

                <div class="form-group"> <!-- dts producto -->
                    <div class="row">
                        <div class="col-12 col-sm-3"> <!-- dentro de este div agregamos label -->
                            <input type="hidden" id="id_producto" name="id_producto" />
                            <label>Codigo Producto</label>
                            <input class="form-control" id="cod_pro" name="cod_prod" type="text" placeholder=
                            "Ingr. Cod. Producto - Enter" onkeyup="buscarProducto(event, this, this.value)" autofocus />
                            <label for="cod_pro" id="resultado_error" style="color: red"></label>
                        </div>

                        <div class="col-12 col-sm-3"> <!-- dentro de este div agregamos label -->
                            <label>Nombre del Producto</label>
                            <input class="form-control" id="nomb_prod" name="nomb_prod" type="text" disabled />
                        </div>

                        <div class="col-12 col-sm-2">
                            <label for="cantidad">Cantidad</label>
                            <input class="form-control" id="cantidad" name="cantidad" type="text" />
                        </div>

                        <div class="col-12 col-sm-2"> <!-- dentro de este div agregamos label -->
                            <label>Precio de Compra</label>
                            <input class="form-control" id="precio_comp" name="precio_comp" type="text" />
                        </div>

                        <div class="col-12 col-sm-2"> <!-- dentro de este div agregamos label -->
                            <label>Subtotal</label>
                            <input class="form-control" id="subtotal" name="subtotal" type="text" />
                        </div>
                    </div>
                </div>

                <!-- dts IVA -->

                <div class="form-group"> <!-- dts IVA -->
                    <div class="row">
                        <div class="col-12 col-sm-8"> 
                            <label>Ingresa el valor del Impuesto</label>
                        </div>
                        <div class="col-12 col-sm-2"> 
                            <label>Impuesto IVA %</label>
                        </div>
                         <div class="col-12 col-sm-2"> 
                            <input class="form-control" id="impto12_comp" name="impto12_comp" type="text" />
                        </div>
                    </div>    
                </div>

                <div class="form-group"> <!-- dts otro imúesto-->
                    <div class="row">
                        <div class="col-12 col-sm-8"> 
                            <label> </label>
                        </div>
                        <div class="col-12 col-sm-2"> 
                            <label>Otro Impuesto %</label>
                        </div>
                         <div class="col-12 col-sm-2"> 
                            <input class="form-control" id="otroimpt0_comp" name="otroimpt0_comp" type="text" />
                        </div>
                    </div>    
                </div>

                <div class="form-group"> <!-- dts total -->
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <label> </label>
                        </div>
                        <div class="col-12 col-sm-2"> 
                            <label style=color:orangered>Toatal</label>
                        </div>
                         <div class="col-12 col-sm-2"> 
                            <input class="form-control" id="total_comp" name="total_comp" type="text" />
                        </div>
                    </div>    
                </div>
            
                <div class="form-group"> <!-- Boton Agregar -->
                    <div class="col-12 col-sm-10 offset-md-10">
                        <label><br>&nbsp;</label>
                        <button id="agregar_producto" name="agregar_producto" type="button" class="btn btn-primary" 
                        onclick="agregarProducto(id_producto.value, cantidad.value, '<?php echo $id_compra ?>')">Agregar Producto</button>
                    </div>
                </div>
        
                <div class="row">
                    <table id="tablaProductos" class="table table-hover table-striped table-sm 
                            table-responsive tablaProductos" width="100%">
                        <thead class="thead-dark">
                            <th>#</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th width="1%"></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 offset-md-6">
                        <label style="font-weight: bold; font-size: 25px; text-align: center;">Total $</label>
                        <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight: bold; font-size: 27px; text-align: center;">
                        <button type="button" id="completa_compra" class="btn btn-success">Completar Compra</button>
                    </div>
                </div>
            </form>
        </div>
    </main>


<script>
    $(document).ready(function() {

    });

    function buscarProducto(e, tagCodigo, codigo) {
        var enterkey = 13;

        if (codigo != '') {
            if (e.which == enterkey) {
                $.ajax({
                    url: '<?php echo base_url(); ?>/productosContr/buscarPorCodigo/' + codigo,
                    dataType: 'json',
                    success: function(resultado) {
                        if (resultado == 0) {
                            $(tagCodigo).val('');
                        } else {
                            $(tagCodigo).removeClass('has-error');

                            $("#resultado_error").html(resultado.error);

                            if (resultado.existe) {
                                $("#id_producto").val(resultado.datos.id);
                                $("#nomb_prod").val(resultado.datos.nomb_prod);
                                $("#cantidad").val(1);
                                $("#precio_comp").val(resultado.datos.precio_comp);
                                $("#subtotal").val(resultado.datos.precio_comp);
                                $("#cantidad").focus();
                            } else {
                                $("#id_producto").val('');
                                $("#nomb_prod").val('');
                                $("#cantidad").val('');
                                $("#precio_comp").val('');
                                $("#subtotal").val('');

                            }
                        }
                    }
                });

            }
        }

    }

    function buscarProveedor(e, tagCodigo, codigo) {
        var enterkey = 13;

        if (codigo != '') {
            if (e.which == enterkey) {
                $.ajax({
                    url: '<?php echo base_url(); ?>/proveedoresContr/buscarPorCodigo/' + codigo,
                    dataType: 'json',
                    success: function(resultado) {
                        if (resultado == 0) {
                            $(tagCodigo).val('');
                        } else {
                            //$(tagCodigo).removeClass('has-error');

                            $("#resultado_error").html(resultado.error);

                            if (resultado.existe) {
                                $("#id_proveedor").val(resultado.datos.id);
                                $("#nomb_prov").val(resultado.datos.nomb_prov);
                                $("#nomb_prov").focus();
                            } else {
                                $("#id_proveedor").val('');
                                $("#nomb_prov").val('');

                            }
                        }
                    }
                });

            }
        }

    }

    function agregarProducto(id_producto, cantidad, id_compra) {
        
        if (id_producto != null && id_producto !=0 && cantidad >0) {
            
            $.ajax({
                url: '<?php echo base_url(); ?>/CompraTemporalContr/inserta/' + id_producto + "/" + cantidad
                    + "/" + id_compra,
  
                //dataType: 'json',

                success: function(resultado) {
                    
                    if (resultado == 0) {
                            
                    } else {
                        
                       /* $("#resultado_error").html(resultado.error);

                        if (resultado.existe) {
                                $("#id_producto").val(resultado.datos.id);
                                $("#nomb_prod").val(resultado.datos.nomb_prod);
                                $("#cantidad").val(1);
                                $("#precio_comp").val();
                                $("#subtotal").val();
                                $("#cantidad").focus();
                        } else {
                                $("#id_producto").val('');
                                $("#nomb_prod").val('');
                                $("#cantidad").val('');
                                $("#precio_comp").val('');
                                $("#subtotal").val('');

                        }*/
                    }
                }
            });
        }
    }
</script>