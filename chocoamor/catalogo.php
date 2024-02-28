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
        <link rel="stylesheet" href="admin/css/stripe.css">
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
    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
<?php
include_once "admin/db.php";
$con = mysqli_connect($host,$user,$pass,$db);
?>
    <header>
    <?php include_once "menu.php"; ?>
    </header>
    <main>
            <?php
                $modulo=$_REQUEST['modulo']??'';
                if($modulo=="productos" || $modulo==""){
                    include_once "productos.php";
                }
                if($modulo=="detalleproducto"){
                    include_once "detalleProducto.php";
                }
                if($modulo=="carrito"){
                    include_once "carrito.php";
                }
                if($modulo=="envio"){
                    include_once "envio.php";
                }
                if($modulo=="pasarela"){
                    include_once "pasarela.php";
                }
                if($modulo=="factura"){
                    include_once "factura.php";
                }
            ?>
    </main>
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

     <!-- <script src="js/script.js"></script> -->
        <script src="https://js.stripe.com/v3/"></script>
        <script src="admin/js/stripe.js"></script>
        
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
        
        <script src="js/script.js"></script>
        <script src="admin/js/chocoamor.js"></script>
</body>
</html>