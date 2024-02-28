<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Pastelería Chocoamor</title>
</head>
<body class="login-back">
    
    <div class="contenedor-l">
        <div class="forms">
            <div class="form-l login-l">
                <span class="title">Inicia sesión</span>
<?php 
    if (isset($_REQUEST['login'])) {
        session_start();
        $email = $_REQUEST['email']??'';
        $password = $_REQUEST['pass']??'';
        include_once "admin/db.php";
        $con = mysqli_connect($host,$user,$pass,$db);
        $query = "SELECT id,email,nombre FROM clientes where email = '".$email."' and pass = '".$password."'";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
        if ($row) {
            $_SESSION['idCliente'] = $row['id'];
            $_SESSION['emailCliente'] = $row['email'];
            $_SESSION['nombreCliente'] = $row['nombre'];
            header("location: index.php?mensaje=Usuario iniciado exitosamente");
        } else {
?>
            <div class="alert alert-danger" role="alert">
                <span>Error de login</span>
            </div>
<?php
        }
    }
?>
                <form method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Ingresa tu email" name="email" required>
                        <i class='bx bx-envelope icon'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Ingresa tu contraseña" name="pass" required>
                        <i class='bx bx-lock-alt icon' ></i>
                        <i class='bx bx-low-vision showHidePw' ></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        <a href="" class="text">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="input-field button-l">
                        <input type="submit" value="Entrar ahora" name="login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">¿No tienes una cuenta?
                        <a href="registro.php" class="text signup-link">Regístrate ahora</a>
                    </span>
                </div>
            </div>

            <!--Registration form-->
            <!-- <div class="form-l signup">
                <span class="title">Regístrate</span>

                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Ingresa tu nombre" required>
                        <i class='bx bx-user' ></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Ingresa tu email" required>
                        <i class='bx bx-envelope icon'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Ingresa tu contraseña" required>
                        <i class='bx bx-lock-alt icon' ></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Ingresa tu contraseña" required>
                        <i class='bx bx-lock-alt icon' ></i>
                        <i class='bx bx-low-vision showHidePw' ></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="" class="text">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="input-field button-l">
                        <input type="button" value="Entrar ahora">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">¿Ya tienes una cuenta?
                        <a href="#" class="text login-link">Inicia sesión</a>
                    </span>
                </div>
            </div> -->
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>