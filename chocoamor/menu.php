<nav class="nav">
            <a href="index.html" class="logo">Chocoamor</a>
            <div class="logo-nav">
                
                <ul class="lista-nav">
                    <li class="item-nav"><a href="index.php">Inicio</a></li>
                    <li class="item-nav"><a href="catalogo.php">Catálogo</a></li>
                    <li class="item-nav"><a href="acerca.html">Acerca de</a></li>
                    <li class="item-nav"><a href="contacto.html">Contacto</a></li>
                </ul>
                          

                
            </div>
            <div>
                <ul class="" style="list-style: none;
                                    display: flex;
                                    margin: auto 0;">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito" >
                            <i class='bx bx-cart' aria-hidden="true" style="font-size: 2.3rem;
                                                    color: #ca2b63;"></i>
                            <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">

                        </div>
                        
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user" style="font-size: 2rem;
                                                    color: #ca2b63;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <?php 
                                if(isset($_SESSION['idCliente'])==false ){
                            ?>
                            <a href="login.php" class="dropdown-item">
                                <i class="fas fa-door-open mr-2" style=" color: #ca2b63;"></i> Iniciar Sesión
                            </a>
                            <div class="dropdown-divider"></div>
                                <a href="registro.php" class="dropdown-item">
                            <i class="fas fa-sign-in-alt mr-2" style=" color: #ca2b63;"></i>Registrarse
                            </a>
                            <?php 
                                }else{
                            ?>
                            <a href="index.php?modulo=usuario" class="dropdown-item">
                                <i class="fas fa-user mr-2" style=" color: #ca2b63;"></i> Hola, <?php echo $_SESSION['nombreCliente']; ?>
                            </a>
                            <form action="index.php" method="post">
                                <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                                    <i class="fas fa-door-closed mr-2 text-danger"></i> Cerrar Sesión
                                </button>
                            </form>
                            <?php
                                }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!--
                <div class="login">
                 Messages Dropdown Menu
                
                <a href="login.html" class="entrar">Entrar</a>
                <a href="#" class="registrar">Crear cuenta</a>
            </div>
            -->
        </nav>
        <?php
            $mensaje = $_REQUEST['mensaje']??'';
            if($mensaje){
            ?>
                <div class="alert alert-primary alert-dismissible fade show .col-4" role="alert" style="z-index: 200;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?php echo $mensaje; ?>
                </div>
            <?php
            }
        ?>