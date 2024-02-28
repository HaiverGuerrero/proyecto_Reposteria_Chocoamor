<?php
    $id= mysqli_real_escape_string($con, $_REQUEST['id']??'') ;
    $queryProducto="SELECT id,nombre,precio,existencia FROM productos where id='$id'";
    $resProducto = mysqli_query($con, $queryProducto);
    $rowProducto = mysqli_fetch_assoc($resProducto);
?>
 <!-- Default box -->
      <div class="container">
      <div class="card card-solid " style="margin-top: 5rem;">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nombre']; ?></h3>
              <?php
              $queryImagenes="SELECT
              f.web_path
              FROM
              productos AS p
              INNER JOIN productos_files AS pf ON pf.producto_id=p.id
              INNER JOIN files AS f ON f.id=pf.file_id
              WHERE p.id = '$id'
              ";
              $resPrimerImagen = mysqli_query($con, $queryImagenes);
              $rowPrimerImagen = mysqli_fetch_assoc($resPrimerImagen);
              ?>
                <div class="col-12">
                    <img src="<?php echo $rowPrimerImagen['web_path'] ?>" class="product-image" id="PrimerImagen">
                </div>
                <div class="col-12 product-image-thumbs">
              <?php
              $resImagen = mysqli_query($con, $queryImagenes);
              while( $rowImagenes = mysqli_fetch_assoc($resImagen) ){
              ?>
              
              
                <div class="product-image-thumb active"><img src="<?php echo $rowImagenes['web_path'] ?>" onclick="changeImage(this)"></div>
              
              <?php
            }
              ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" style="text-transform: uppercase;"><strong><?php echo $rowProducto['nombre']; ?></strong></h3>
              <!-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p> -->

              <hr>
              <h4>Rellenos disponibles</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Limón
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Arándano
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Mora
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Fresa
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Naranja
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div>

              <h4 class="mt-5">Tamaño -<small> Por favor selecciona uno</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">20cm</span>
                  <br>
                  2,5 KG
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">24cm</span>
                  <br>
                  4 KG
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">28cm</span>
                  <br>
                  5 KG
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">30cm</span>
                  <br>
                  5,7 KG
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-5">
                <h2 class="mb-0">
                  $<?php echo number_format($rowProducto['precio'], 2) ; ?>
                </h2>
              </div>
              <div class="mt-4">
                Cantidad
                <input type="number" class="form-control" id="cantidadProducto" value="1">
              </div>
              <div class="mt-4">
                <button class="btn btn-info btn-lg btn-flat" id="agregarCarrito"
                data-id="<?php echo $_REQUEST['id'] ?>"
                data-nombre="<?php echo $rowProducto['nombre']; ?>"
                data-web_path="<?php echo $rowPrimerImagen['web_path'] ?>"
                data-precio="<?php echo $rowProducto['precio'] ?>"
                >
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Añadir al carrito
                </button>
                <div class="btn btn-dark btn-lg btn-flat">
                  <i class="fas fa-message fa-lg mr-2"></i>
                  Añadir comentarios
                </div>

              

            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>


<script type="text/javascript">
    function changeImage(x){
        document.getElementById('PrimerImagen').src= x.src;
    }
</script>