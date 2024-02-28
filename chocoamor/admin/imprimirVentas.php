<?php
session_start();
include_once "db.php";
$con = mysqli_connect($host, $user, $pass, $db);


?>
<?php ob_start(); ?>
<div>
    <p class="logo">Chocoamor</p>
</div>

<table style="width: 750px;margin-top: 20px;">
    <thead>
        <tr>
            <th colspan="7" class="text-center mb-5">VENTAS</th>
        </tr>
        <tr>
            <th style="text-align: left;">Cliente</th>
            <th style="text-align: left;">Dirección</th>
            <th style="text-align: left;">Fecha</th>
            <th style="text-align: left;">Producto</th>
            <th style="text-align: left;">Cantidad</th>
            <th style="text-align: left;">Precio</th>
            <th style="text-align: left;">SubTotal</th>
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

<?php $html= ob_get_clean(); ?> 

<?php

include_once "dompdf/autoload.inc.php";
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landingscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>