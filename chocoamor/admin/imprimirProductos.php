<?php

use DataTables\Editor\Upload;

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
            <th colspan="3" class="text-center mb-5">PRODUCTOS</th>
        </tr>
        <tr>
            <th style="text-align: left;">Nombre</th>
            <th style="text-align: left;">Precio</th>
            <th style="text-align: left;">Existencia</th>
            <th style="text-align: left;">Imagen</th>
        </tr>
    </thead>
    <tbody>
    <?php

$query = "SELECT
                p.id,
                p.nombre,
                p.precio,
                p.existencia,
                f.system_path
                FROM
                productos AS p
                INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                INNER JOIN files AS f ON f.id=pf.file_id
                ";
$res=mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($res)) {
    //$img = '<img src="data:image;base64,'.base64_encode(@file_get_contents($row['system_path'])).'" >';
?>
    <tr>
        <td style="text-align: left;"><?php echo $row['nombre'] ?></td>
        <td style="text-align: left;">$<?php echo $row['precio'] ?></td>
        <td style="text-align: left;"><?php echo $row['existencia'] ?></td>
        <td style="text-align: left;"><img src="data:image;base64,'.base64_encode(@file_get_contents(./upload/7.jpg).'" ></td>
    </tr>
<?php
}
?>
    </tbody>
</table> 

<?php $html= ob_get_clean(); 
?> 

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