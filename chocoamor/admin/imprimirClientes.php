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
            <th colspan="3" class="text-center mb-5">Clientes</th>
        </tr>
        <tr>
            <th style="text-align: left;">Nombre</th>
            <th style="text-align: left;">Email</th>
            <th style="text-align: left;">Dirección</th>
        </tr>
    </thead>
    <tbody>
    <?php

$query = "SELECT id,email,nombre,direccion FROM clientes;";
$res = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($res)) {
?>
    <tr>
        <td style="text-align: left;"><?php echo $row['nombre'] ?></td>
        <td style="text-align: left;"><?php echo $row['email'] ?></td>
        <td style="text-align: left;"><?php echo $row['direccion'] ?></td>
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