<?php 
include_once "db.php";
$con = mysqli_connect($host,$user,$pass,$db);

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ventas</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Direccion</th>
                                        <th>fecha</th>
                                        <th>Producto</th>
                                        <th>cantidad</th>
                                        <th>precio</th>
                                        <th>subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

$query = "SELECT * FROM detalleventas AS dv
            INNER JOIN productos AS p ON p.id = dv.idProd
            INNER JOIN ventas AS v ON v.id = dv.idVentas";
$res = mysqli_query($con, $query);
while ($row=mysqli_fetch_assoc($res)) {
    $cliente = "SELECT nombre, direccion FROM clientes where
    id = ".$row['idCli']."";
    $resCli = mysqli_query($con, $cliente);
    $rowCli = mysqli_fetch_assoc($resCli);
?>

    
    
                                    <tr>
                                        <td><?php echo $rowCli['nombre'] ?></td>
                                        <td><?php echo $rowCli['direccion'] ?></td>
                                        <td><?php echo $row['fecha'] ?></td>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['cantidad']?></td>
                                        <td><?php echo $row['precio']?></td>
                                        <td><?php echo $row['subTotal']?></td>
                                    </tr>
<?php
}
?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
</div>
<div class="mr-3 mb-5">
            <a class="btn btn-secondary float-right" target="_blank" href="imprimirVentas.php" role="button">Imprimir ventas <i class="fas fa-file-pdf"></i> </a>
        </div>