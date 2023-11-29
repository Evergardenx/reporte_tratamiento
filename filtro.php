<?php
sleep(1);
include('config.php');

$fechaInit = date("Y-m-d", strtotime($_POST['f_inicio']));
$fechaFin = date("Y-m-d", strtotime($_POST['f_fin']));

$sqlTratamientos = ("SELECT * FROM tratamiento WHERE  `fecha_inicio` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_inicio ASC");
$query = mysqli_query($con, $sqlTratamientos);
$total = mysqli_num_rows($query);
echo '<strong>Total: </strong> (' . $total . ')';
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cedula Residente</th>
            <th scope="col">Doctor</th>
            <th scope="col">Enfermedad</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Dosis</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Fin</th>
            <th scope="col">Servicio</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $dataRow['nombre']; ?></td>
                <td><?php echo $dataRow['apellido']; ?></td>
                <td><?php echo $dataRow['cedula_residente']; ?></td>
                <td><?php echo $dataRow['doctor']; ?></td>
                <td><?php echo $dataRow['enfermedad']; ?></td>
                <td><?php echo $dataRow['medicamento']; ?></td>
                <td><?php echo $dataRow['dosis']; ?></td>
                <td><?php echo $dataRow['fecha_inicio']; ?></td>
                <td><?php echo $dataRow['fecha_fin']; ?></td>
                <td><?php echo $dataRow['servicio']; ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>