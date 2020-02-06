<?php
if($_SESSION["perfil"] == "Laboratorio")
'<!DOCTYPE html>
<html>
  <head>
  <META HTTP-EQUIV="REFRESH" CONTENT="5;URL=">
  </head>
</html>'
?>

<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Pedidos Al Laboratorio Local
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Pedidos Al Laboratorio Local</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarlocal">
          
          Agregar Pedido

        </button>

      </div>


      <div>
        
<form id="prueba" role="form" method="post" enctype="multipart/form-data">

<input type="hidden"  id="medida_terminado" name="medida_terminado" type="text">
<input type="hidden" id="tipo_terminado" name="tipo_terminado" type="text">
<input type="hidden" id="codigo_terminado" name="codigo_terminado" type="text">
<input type="hidden" id="descripcion_terminado" name="descripcion_terminado" type="text">
<input type="hidden" id="lu_terminado" name="lu_terminado" type="text">
<input type="hidden" id="precio_de_venta_terminado" name="precio_de_venta_terminado" type="text">

<input type="hidden" id="fecha_terminado" name="fecha_terminado" type="text">
<input  type="hidden" id="fecha_de_terminado" name="fecha_de_terminado" type="text">


</form>

<?php
  $crearterminados = new Controladorterminados();
  $crearterminados -> ctrCrearterminados();
?>  

</div>



      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablalocal" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Tipo</th>
           <th>Aumento</th>
           <th>Descripción</th>
           <th>Lugar</th>
           <th>Precio de venta</th>
           <th>Agregado</th>
           <th>Estado</th>
           <th>Acciones</th>
           <!--<th>Status</th>
           <th>Imprimir</th>-->

           
         </tr> 

        </thead>      

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>




<!--=====================================
MODAL AGREGAR PEDIDO AL LABORATORIO LOCAL
======================================-->

<div id="modalAgregarlocal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Pedido</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" required>

              </div>

            </div>
             <!-- ENTRADA PARA TIPO DE CRISTAL -->
            <div class="row">

             <div class="form-group">

               <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg" id="nuevoTipo" name="nuevoTipo" required>
                
                    <option value="">Tipo De Cristal</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $tipo = ControladorTipo::ctrMostrarTipo($item, $valor);

                    foreach ($tipo as $key => $value) {
                  
                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                    } 

                    ?>

                  </select>
               </div>
              </div>
            </div>
           <!-- ENTRADA PARA AUMENTO DEL CRISTAL  -->
           <div class="test form-group">
            <div class="col-xs-6">
              <div class="test input-group">
          
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoMedida" name="nuevoMedida" required>
              
                  <option value="">Aumento Del Cristal</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $aumento = ControladorAumento::ctrMostrarAumento($item, $valor);

                  foreach ($aumento as $key => $value) {
                
                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                  } 

                  ?>

                </select>
              </div>
            </div>
          </div>
          </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

              </div>

            </div>
              
            

            <!-- ENTRADA PARA ESTATUS-->
            <div class="form-group">


            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span> 

             <select class="form-control input-lg" id="nuevoLugar" name="nuevoLugar" required>
 
             <option value="">Laboratorio Del Pedido</option>

             <?php

              $item = null;
              $valor = null;

              $lugar = ControladorLugar::ctrMostrarLugar($item, $valor);

              foreach ($lugar as $key => $value) {
   
              echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
              } 

            ?>

            </select>
            </div>
            </div>
            
             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra Bs" required>

                  </div>
                  <br>
                  <div class="col-xs-15">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                  <input type="number" class="form-control input-lg" id="nuevoPrecioDolar" name="nuevoPrecioDolar" step="any" min="1" placeholder="Precio de venta en $" required>

                </div>

                </div>

                <br>

                <div class="col-xs-15">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                  <input type="number" class="form-control input-lg" id="nuevoPrecioTasa" name="nuevoPrecioTasa" step="any" min="1" placeholder="Tasa Del Dia" required>

                </div>

                </div>
              
              
                </div>
                 

              


                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta Bs" required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="50" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Pedido</button>

        </div>

      </form>

        <?php

          $crearlocal = new Controladorlocal();
          $crearlocal -> ctrCrearlocal();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PEDIDO AL LABORATORIO LOCAL
======================================-->

<div id="modalEditarlocal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Pedido</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      
        <div class="modal-body">

          <div class="box-body">
          
        

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>
               <!-- ENTRADA PARA TIPO DE CRISTAL -->
                <div class="row">

                <div class="form-group">

                  <div class="col-xs-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control input-lg" id="nuevoTipo" name="nuevoTipo" readonly>
                  
                      <option value="">Tipo De Cristal</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $tipo = ControladorTipo::ctrMostrarTipo($item, $valor);

                      foreach ($tipo as $key => $value) {
                    
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      } 

                      ?>

                    </select>
                  </div>
                </div>
                </div>
                <!-- ENTRADA PARA AUMENTO DEL CRISTAL  -->
                <div class="test form-group">
                <div class="col-xs-6">
                <div class="test input-group">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg" id="nuevoMedida" name="nuevoMedida" readonly>
                
                    <option value="">Aumento Del Cristal</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $aumento = ControladorAumento::ctrMostrarAumento($item, $valor);

                    foreach ($aumento as $key => $value) {
                  
                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                    } 

                    ?>

                  </select>
                </div>
                </div>
                </div>
                </div>


            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editarlocal = new Controladorlocal();
          $editarlocal -> ctrEditarlocal();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarlocal = new Controladorlocal();
  $eliminarlocal -> ctrEliminarlocal();

?>      



</html>