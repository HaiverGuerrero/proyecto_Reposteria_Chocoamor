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
        <div class="forms" style="height: 530px;">
            <!-- <div class="form-l login-l">
                <span class="title">Inicia sesión</span> -->

            <!--     <form method="post">
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
                        <a href="#" class="text signup-link">Regístrate ahora</a>
                    </span>
                </div>
            </div> -->

            <!--Registration form-->
            <div class="form-l login-l">
                <span class="title">Regístrate</span>

                <?php 
    if (isset($_REQUEST['registro'])) {
        session_start();
        $nombre = $_REQUEST['nombre']??'';
        $email = $_REQUEST['email']??'';
        $password = $_REQUEST['pass']??'';
        include_once "admin/db.php";
        $con = mysqli_connect($host,$user,$pass,$db);
        
        $query = "INSERT INTO clientes (nombre, email, pass) VALUES ('$nombre','$email','$password')";
        $res = mysqli_query($con, $query);
        try {
            
        } catch (\Throwable $th) {
            echo "error";
        }

        
        if ($res) {
        ?>
            <div class="alert alert-primary" role="alert">
                <strong>Registro exitoso</strong> <a href="login.php">Ir al login</a>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                Error de Registro
            </div>
        <?php
        }
    }
        ?>

                <form method="post" id="formulario">
                    
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="input-field formulario__grupo-input">
                        <input type="text" class="formulario__input" placeholder="Ingresa tu nombre" id="nombre" name="nombre" required>
                            <i class='bx bx-user' ></i>
                        </div>
                        <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                    </div>
                    <!-- Grupo: Correo Electronico -->
                    <div class="formulario__grupo" id="grupo__email">
                        <div class="input-field formulario__grupo-input">
                            <input type="email" class="formulario__input" placeholder="Ingresa tu email" required name="email" id="correo">
                            <i class='bx bx-envelope icon'></i>
                        </div>
                        <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                    </div>
                    
                    <!-- Grupo: Contraseña -->
                    <div class="formulario__grupo" id="grupo__pass">
                        <div class="input-field formulario__grupo-input">
                            <input type="password" class="password formulario__input" placeholder="Ingresa tu contraseña" name="pass" id="password" required>
                            <i class='bx bx-lock-alt icon' ></i>
                        </div>
                        <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                    </div>
                    <!-- Grupo: Contraseña 2 -->
                    <div class="formulario__grupo" id="grupo__pass2">
                        <div class="input-field formulario__grupo-input">
                            <input type="password" class="password formulario__input" placeholder="Ingresa tu contraseña" name="pass2" id="password2" required>
                            <i class='bx bx-lock-alt icon' ></i>
                            <i class='bx bx-low-vision showHidePw' ></i>
                        </div>
                        <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                    </div>
                    <div class="formulario__grupo" id="grupo__terminos">
                        <label class="formulario__label">
                            <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                            Acepto los Terminos y Condiciones
                        </label>
                    </div>
                    <div class="formulario__mensaje" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>

                    <div class="formulario__grupo formulario__grupo-btn-enviar input-field button-l">
                        <input type="submit" class="formulario__btn" value="Registrarse" name="registro">
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">¿Ya tienes una cuenta?
                        <a href="login.php" class="text signup-link">Inicia sesión</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <!-- <script src="admin/plugins/jquery/jquery.min.js"></script>
    <-- AdminLTE App 
    <script src="admin/dist/js/adminlte.min.js"></script> -->
    
    <script src="js/script.js"></script>
    <!-- <script src="js/formulario.js"></script> -->
</body>
</html>