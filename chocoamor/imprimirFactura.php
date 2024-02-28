<?php
session_start();
include_once "admin/db.php";
$con = mysqli_connect($host, $user, $pass, $db);

$queryRecibe="SELECT nombre,email,direccion 
from recibe 
where idCli='".$_SESSION['idCliente']."';";
$resRecibe=mysqli_query($con,$queryRecibe);
$rowRecibe=mysqli_fetch_assoc($resRecibe);

$queryCli="SELECT nombre,email,direccion 
from clientes 
where id='".$_SESSION['idCliente']."';";
$resCli=mysqli_query($con,$queryCli);
$rowCli=mysqli_fetch_assoc($resCli);

$idVenta= mysqli_real_escape_string($con,$_REQUEST['idVenta']??'');
$queryVenta="SELECT v.id,v.fecha
FROM ventas AS v
WHERE v.id = '$idVenta';";
$resVenta=mysqli_query($con,$queryVenta);
$rowVenta=mysqli_fetch_assoc($resVenta);
?>
<?php ob_start(); ?>
<div>
    <p class="logo">Chocoamor</p>
</div>

<table style="width: 750px;margin-top: 20px;">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Recibe</th>
            <th>Datos de la factura</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <strong>Nombre: </strong><?php echo $rowCli['nombre'] ?><br>
                <strong>Email: </strong><?php echo $rowCli['email'] ?><br>
                <strong>Direccion: </strong><?php echo $rowCli['direccion'] ?><br>
            </td>
            <td>
                <strong>Nombre: </strong><?php echo $rowRecibe['nombre'] ?><br>
                <strong>Email: </strong><?php echo $rowRecibe['email'] ?><br>
                <strong>Direccion: </strong><?php echo $rowRecibe['direccion'] ?><br>
            </td>
            <td>
                <strong>Id: </strong><?php echo $rowVenta['id'] ?><br>
                <strong>Fecha: </strong><?php echo $rowVenta['fecha'] ?><br>
            </td>
        </tr>
    </tbody>
</table> 
<table style="width: 750px;margin-top: 30px;">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Detalle de venta</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $queryDetalle="SELECT
                    p.nombre,
                    dv.cantidad,
                    dv.precio,
                    dv.subTotal
                    FROM
                    ventas AS v
                    INNER JOIN detalleVentas AS dv ON dv.idVentas = v.id
                    INNER JOIN productos AS p ON p.id = dv.idProd
                    WHERE
                    v.id = '$idVenta'";
                    $resDetalle=mysqli_query($con,$queryDetalle);
                    $total=0;
                    while($row=mysqli_fetch_assoc($resDetalle)){
                        $total=$total+$row['subTotal'];
                ?>
                <tr >
                    <td style="text-align: center;"><?php echo $row['nombre'] ?></td>
                    <td style="text-align: center;"><?php echo $row['cantidad'] ?></td>
                    <td style="text-align: center;">$<?php echo moneyFormat($row['precio'],'USD') ?></td>
                    <td style="text-align: center;">$<?php echo moneyFormat($row['subTotal'],'USD') ?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3" class="text-right" style="text-align: right;">Total:</td>
                    <td style="text-align: center;">$<?php echo moneyFormat($total,'USD'); ?></td>
                </tr>

            </tbody>
        </table>
        <?php $html= ob_get_clean(); ?> 

<?php


function moneyFormat($price,$curr) {
    $currencies['EUR'] = array(2, ',', '.');        // Euro
    $currencies['ESP'] = array(2, ',', '.');        // Euro
    $currencies['USD'] = array(2, '.', ',');        // US Dollar
    $currencies['COP'] = array(2, ',', '.');        // Colombian Peso
    $currencies['CLP'] = array(0,  '', '.');        // Chilean Peso

    return number_format($price, ...$currencies[$curr]);
}
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