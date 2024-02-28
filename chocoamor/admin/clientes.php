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
                    <h1>Clientes</h1>
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
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php

$query = "SELECT id,email,nombre,direccion FROM clientes;";
$res = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($res)) {
?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['direccion']?></td>
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
    <div class="mr-3">
            <a class="btn btn-secondary float-right" target="_blank" href="imprimirClientes.php" role="button">Imprimir clientes <i class="fas fa-file-pdf"></i> </a>
        </div>
</div>