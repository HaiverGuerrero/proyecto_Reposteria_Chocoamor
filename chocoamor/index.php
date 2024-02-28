<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
        <script src="https://kit.fontawesome.com/a19b1253be.js" crossorigin="anonymous"></script>

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Pastelería Chocoamor</title>
    <?php
        session_start();
        $accion=$_REQUEST['accion']??'';
        if ($accion=='cerrar') {
            session_destroy();
            header("Refresh:0");
        }
    ?>
</head>
<body>

    <header class="header">
        <?php include_once "menu.php"; ?>
        <div class="hero">
            <div class="title">
                <div class="title-hero">
                    <h1>REPOSTERÍA <br> CHOCOAMOR</h1>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <a href="#">Comprar ahora</a>
                </div>
                
                <ul class="social-media">
                    <li><a href=""><i class='bx bxl-facebook'></i></a></li>
                    <li><a href=""><i class='bx bxl-instagram-alt' ></i></a></li>
                    <li><a href=""><i class='bx bxl-twitter'></i></a></li>
                </ul>
            </div>
            <figure>
                <img src="images/cake-hero.png" alt="pastel" width="500">
            </figure>
        </div>
    </header>

    <main>
        <!-- <div class="catalog">
            <h2 class="title-catalog">Últimos Productos</h2>
            <div class="latest-products contenedor">
                
                <div class="card">
                    <img src="images/cake-hero.jpg" alt="">
                    <div class="precio">
                        <p>Torta de chocolate</p>
                        <p><span>30$</span></p>
                        <a href="" class="carrito">Añadir al carrito <i class='bx bx-cart'></i></a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/cake-hero.jpg" alt="">
                    <div class="precio">
                        <p>Torta de chocolate</p>
                        <p><span>30$</span></p>
                        <a href="" class="carrito">Añadir al carrito <i class='bx bx-cart'></i></a>
                    </div>
                </div>
                <div class="card big-card">
                    <img src="images/cake-hero.jpg" alt="">
                    <div class="precio">
                        <p>Torta de chocolate</p>
                        <p><span>30$</span></p>
                        <a href="" class="carrito">Añadir al carrito <i class='bx bx-cart'></i></a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/cake-hero.jpg" alt="">
                    <div class="precio">
                        <p>Torta de chocolate</p>
                        <p><span>30$</span></p>
                        <a href="" class="carrito">Añadir al carrito <i class='bx bx-cart'></i></a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/cake-hero.jpg" alt="">
                    <div class="precio">
                        <p>Torta de chocolate</p>
                        <p><span>30$</span></p>
                        <a href="" class="carrito">Añadir al carrito <i class='bx bx-cart'></i></a>
                    </div>
                </div>
            </div>
            <div class="ver-mas">
                <a href="catalogo.html" class="">Ver más</a>
            </div>
        </div> -->
        <h2 class="title-catalog">Últimos Productos</h2>
        <div class="row contenedor mt-1">
            
            <?php
            include_once "admin/db.php";
            $con = mysqli_connect($host,$user,$pass,$db);
            $query = "SELECT
            p.id,
            p.nombre,
            p.precio,
            p.existencia,
            f.web_path
            FROM
            productos AS p
            INNER JOIN productos_files AS pf ON pf.producto_id=p.id
            INNER JOIN files AS f ON f.id=pf.file_id
            GROUP BY p.id
            ";
            $res=mysqli_query($con, $query);
            $contador = 0;
            while($row=mysqli_fetch_assoc($res)){
            ?>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card border-primary">
                        <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path'] ?>" alt="" style="height: 400px;">
                        <div class="card-body">
                            <p class="card-text" style="
                                                        text-transform:uppercase;"><strong><?php echo $row['nombre'] ?></strong></p>
                            <p class="card-text" ><strong>Precio: </strong><?php echo $row['precio'] ?></p>
                            <p class="card-text"><strong>Existencia: </strong><?php echo $row['existencia'] ?></p>
                            <div style="display:flex;
                                        align-items: center;
                                        justify-content: center">
                                <a href="#" style="font-size:1rem;
                                                    padding: 1rem 2rem;
                                                    color: #f4f4f4;
                                                    text-decoration: none;
                                                    border-radius: 10px;
                                                    background-color: #ca2b63;
                                                    text-align: center;">VER</a>
                             </div>
                        </div>
                    </div>
                </div>

            <?php
            $contador++;
            if($contador==6){
                break;
            }
            }
            ?>
        </div>
        <div class="ver-mas" style="margin-bottom: 3rem;
                                    margin-top: 2rem;">
                <a href="catalogo.php" class="">Ver más</a>
            </div>
    </main>

    <section class="ventajas">
        <h2>Nuestras Ventajas</h2>
        <div class="vent-items contenedor">
            <div class="v-i">
                <img src="images/vent1.jpg" alt="">
                <h3>Alta calidad</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="v-i">
                <img src="images/vent2.jpg" alt="">
                <h3>Envío rápido</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="v-i">
                <img src="images/vent3.jpg" alt="">
                <h3>Pago seguro</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
    </section>

    <div class="contador parallax">
        <div class="contador">
            <h2>Suscríbete al newsletter</h2>
            <form action="">
                <input type="email" name="" id="" placeholder="Tu E-mail" class="email">
                <input type="submit" value="Enviar" class="button">
            </form>
        </div>
    </div>

    <section class="seccion-testimoniales">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor">
          <div class="testimonial">
             <blockquote>
                <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi numquam maxime nesciunt adipisci maiores laboriosam nihil doloremque? Necessitatibus sed soluta, nemo accusantium, ipsa doloribus, asperiores fuga rem vel.
                </p>
                <footer class="info-testimonial clearfix">
                   <img src="images/testimonial.jpg" alt="imagen testimonial">
                   <cite>Oswaldo Aponte Escobedo <span>@OswaldoA</span></cite>
                </footer>
             </blockquote>
          </div><!--Testimonial-->
          <div class="testimonial">
             <blockquote>
             <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi numquam maxime nesciunt adipisci maiores laboriosam nihil doloremque? Necessitatibus sed soluta, nemo accusantium, ipsa doloribus, asperiores fuga rem vel.
             </p>
             <footer class="info-testimonial clearfix">
                <img src="images/testimonial.jpg" alt="imagen testimonial">
                <cite>Oswaldo Aponte Escobedo <span>@OswaldoA</span></cite>
             </footer>
             </blockquote>
          </div><!--Testimonial-->
          <div class="testimonial">
             <blockquote>
             <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi numquam maxime nesciunt adipisci maiores laboriosam nihil doloremque? Necessitatibus sed soluta, nemo accusantium, ipsa doloribus, asperiores fuga rem vel.
             </p>
             <footer class="info-testimonial clearfix">
                <img src="images/testimonial.jpg" alt="imagen testimonial">
                <cite>Oswaldo Aponte Escobedo <span>@OswaldoA</span></cite>
             </footer>
             </blockquote>
          </div><!--Testimonial-->
       </div>
    </section>

    <footer class="footer">
        <div class="contenedor">
            <h3>Sobre Nosotros</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum obcaecati alias ipsam blanditiis, aperiam nostrum mollitia dolor. Quaerat deserunt, vero nulla dignissimos numquam ducimus, voluptatum assumenda officia ipsum dicta excepturi.
                Alias quaerat natus quo voluptate suscipit vitae reiciendis blanditiis quam itaque tempora! Incidunt repudiandae placeat fugit distinctio beatae est quis libero, culpa expedita ratione! Provident sequi laboriosam veniam pariatur nisi.
            </p>
            <ul class="social-media-footer">
                <li><a href=""><i class='bx bxl-facebook'></i></a></li>
                <li><a href=""><i class='bx bxl-instagram-alt' ></i></a></li>
                <li><a href=""><i class='bx bxl-twitter'></i></a></li>
            </ul>
            <ul class="lista-nav-footer">
                <li class="item-nav"><a href="index.html">Inicio</a></li>
                <li class="item-nav"><a href="catalogo.html">Catálogo</a></li>
                <li class="item-nav"><a href="acerca.html">Acerca de</a></li>
                <li class="item-nav"><a href="contacto.html">Contacto</a></li>
            </ul>
        </div>
        <p class="copyright">Todos los derechos reservados REPOSTERÍA CHOCOAMOR 2022.</p>
     </footer>

     <script src="js/script.js"></script>
        <!-- jQuery -->
        <script src="admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- daterangepicker -->
        <script src="admin/plugins/moment/moment.min.js"></script>
        <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- AdminLTE App -->
        <script src="admin/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="admin/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="admin/dist/js/pages/dashboard.js"></script>
        <script src="admin/js/chocoamor.js"></script>
</body>
</html>