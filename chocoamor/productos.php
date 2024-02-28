<h2 class="title-catalog">Catálogo</h2>
            <div class="row contenedor mt-1">
                
                <?php
                $where="where 1=1";
                $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre']??'') ;
                if( empty($nombre)==false ){
                    $where += "and nombre like '%".$nombre."%' ";
                }

                $queryCuenta = "SELECT COUNT(*) as cuenta FROM productos $where;";
                $resCuenta = mysqli_query($con, $queryCuenta);
                $rowCuenta = mysqli_fetch_assoc($resCuenta);
                $totalRegistros = $rowCuenta['cuenta'];

                $elementosPorPagina=6;

                $totalPaginas=ceil($totalRegistros/$elementosPorPagina);

                $paginaSel=$_REQUEST['pagina']??false;

                if($paginaSel==false){
                    $inicioLimite=0;
                    $paginaSel=1;
                }else{
                    $inicioLimite=($paginaSel-1)*$elementosPorPagina;
                }
                $limite=" limit $inicioLimite,$elementosPorPagina ";

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
                $where
                GROUP BY p.id
                $limite
                ";
                $res=mysqli_query($con, $query);
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
                                    <a href="catalogo.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" style="font-size:1rem;
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
                }
                ?>
            </div>
            <?php 
            if($totalPaginas>0){
            ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center pagination-lg" >
                        <?php
                        if( $paginaSel != 1){
                        ?>
                        <li class="page-item text-bg-secondary">
                            <a class="page-link" href="catalogo.php?modulo=productos&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous" style="color: #ca2b63;">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>

                        <?php
                            for($i=1; $i<=$totalPaginas ; $i++){
                        ?>
                                <li class="page-item text-bg-secondary <?php //echo ($paginaSel==$i)?" active ":" "; ?>" >
                                    <a class="page-link text-bg-secondary" href="catalogo.php?modulo=productos&pagina=<?php echo $i; ?>" style="color: #ca2b63;"><?php echo $i; ?></a>
                                </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($paginaSel!=$totalPaginas){
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="catalogo.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next" style="color: #ca2b63;">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            <?php
            }
            ?>