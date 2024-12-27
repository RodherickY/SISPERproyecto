<?php

include("conexion.php");
//include("cabecera.php");
include("cabeceraLogo.php");
include("barralateral.php");

$cod = $_SESSION["usuario"];

// Obtener tipo de usuario
$sqlTipo = "SELECT tipo_usuario FROM usuario WHERE codigo = '$cod'";
$fTipo = mysqli_query($cn, $sqlTipo);
$rTipo = mysqli_fetch_assoc($fTipo);

// Verificar si es institución o persona
if ($rTipo['tipo_usuario'] == '1') { // Institución
    $sql = "SELECT i.*, d.* 
            FROM institucion i 
            LEFT JOIN datoespecifico d ON i.codigo = d.codigo 
            WHERE i.codigo = '$cod'";
    $f = mysqli_query($cn, $sql);
    $r = mysqli_fetch_assoc($f);
} else { // Persona
    $sql = "SELECT p.*, d.* 
            FROM persona p 
            LEFT JOIN datoespecifico d ON p.codigo = d.codigo 
            WHERE p.codigo = '$cod'";
    $f = mysqli_query($cn, $sql);
    $r = mysqli_fetch_assoc($f);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrincipalAdmin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1, h3, center {
            color: #333;
        }

        .tabla-contenedor {
            margin: 20px auto;
            max-width: 800px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f3f3f3;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td {
            color: #555;
        }


        .highlight {
            color: #d9534f;
            font-weight: bold;
        }

        .center-text {
            text-align: center;
        }

        h1 {
            text-align: center;
            font-size: 1.8em;
            margin: 20px 0;
        }

        .btn-update {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px auto;
            background-color: #0275d8;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .btn-update:hover {
            background-color: #025aa5;
        }
    </style>
</head>
<body>

<br>
<center>
<?php if ($rTipo['tipo_usuario'] == '1') { ?>
    <h3>Bienvenido(a) institución: <span class="highlight"><?php echo $r["nombre"]; ?></span></h3>
<?php } else { ?>
    <h3>Bienvenido(a): <span class="highlight"><?php echo $r["nombre"] . " " . $r["apaterno"] . " " . $r["amaterno"]; ?></span></h3>
<?php } ?>
</center>
<br>

<div class="tabla-contenedor">
    <table>
        <?php if ($rTipo['tipo_usuario'] == '1') { ?>
            <!-- Datos de institución -->
            <tr>
                <td rowspan="7" align="center" valign="middle">
                    <img src="imgusuario/<?php echo $r["codigo"] ?>.png" width="150" height="150" alt="Imagen Institución">
                </td>
                <td align="right">Código:</td>
                <td><?php echo $r["codigo"]; ?></td>
            </tr>
            <tr>
                <td align="right">Nombre:</td>
                <td><?php echo $r["nombre"]; ?></td>
            </tr>
            <tr>
                <td align="right">Provincia:</td>
                <td><?php echo $r["provincia"]; ?></td>
            </tr>
            <tr>
                <td align="right">Director:</td>
                <td><?php echo $r["director"]; ?></td>
            </tr>
            <tr>
                <td align="right">N. Alumnos:</td>
                <td><?php echo $r["nalumnos"]; ?></td>
            </tr>
            <tr>
                <td align="right">N. Docentes:</td>
                <td><?php echo $r["ndocentes"]; ?></td>
            </tr>
            <tr>
                <td align="right">N. Administrativos:</td>
                <td><?php echo $r["nadministrativos"]; ?></td>
            </tr>
        <?php } else { ?>
            <!-- Datos de persona -->
            <tr>
                <td rowspan="6" align="center" valign="middle">
                    <img src="imgusuario/<?php echo $r["codigo"]?>.png" width="150" height="150" alt="Imagen Persona">
                </td>
                <td align="right">Código:</td>
                <td><?php echo $r["codigo"]; ?></td>
            </tr>
            <tr>
                <td align="right">Ap. Paterno:</td>
                <td><?php echo $r["apaterno"]; ?></td>
            </tr>
            <tr>
                <td align="right">Ap. Materno:</td>
                <td><?php echo $r["amaterno"]; ?></td>
            </tr>
            <tr>
                <td align="right">Nombres:</td>
                <td><?php echo $r["nombre"]; ?></td>
            </tr>
            <tr>
                <td align="right">Provincia:</td>
                <td><?php echo $r["provincia"]; ?></td>
            </tr>
            <?php
            $fechaNacimiento = new DateTime($r["fnacimiento"]);
            $hoy = new DateTime();
            $edad = $hoy->diff($fechaNacimiento)->y;
            ?>
            <tr>
                <td align="right">Edad:</td>
                <td><?php echo $edad; ?> años</td>
            </tr>
        <?php } ?>
    </table>
</div>

<br>

<?php if ($r["estado"] == 0) { ?>
    <center>
        <h1>ACTUALICE SUS DATOS ESPECÍFICOS</h1>
    </center>
<?php } else { ?>
    <div class="tabla-contenedor">
        <table>
            <tr>
                <td>CORREO:</td>
                <td colspan="2"><?php echo $r["correo"]; ?></td>
            </tr>
            <tr>
                <td>DIRECCIÓN:</td>
                <td colspan="2"><?php echo $r["direccion"]; ?></td>
            </tr>
            <tr>
                <td>CELULAR:</td>
                <td><?php echo $r["telefono"]; ?></td>
            </tr>
            <?php if ($rTipo['tipo_usuario'] != '1') { ?>
                <tr>
                    <td>SEXO:</td>
                    <td><?php echo $r["sexo"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

<br>
</body>
</html>

