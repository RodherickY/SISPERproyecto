<?php
include("conexion.php");
//include("cabecera.php");
include("cabeceraLogo.php");
include("barralateral.php");

$id = $_GET["id"];

$sql = "select * from sugerencia where idsugerencia = $id";
$fila = mysqli_query($cn, $sql);
$r = mysqli_fetch_assoc($fila);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sugerencia</title>
</head>

<body>
    <br>
    <br><br>
    <center>
        <h1>EDITAR SUGERENCIA</h1>
    </center>

    <br>
    <br>


<center>

    <form action="p_editarsugerencia.php" method="POST">

    <table align="center" border="1" cellspacing="0" bgcolor="lightblue" width="600" >
    <tr>
        <td>APORTE:</td>
        <td colspan="2">
            <textarea name="txtaporte" rows="4" cols="60"><?php echo $r["descripcion"]; ?></textarea>
        </td>

        <div>
            <input type="hidden" name="idsugerencia" value=<?php echo $id?>>
        </div>
    </tr>
    </table>
    <br>
    <center><input type="submit" value="Actualizar Sugerencia"></center>

    </form>

</center>
</body>

</html>