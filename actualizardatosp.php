<?php

include("conexion.php");
//include("cabecera.php");
include("cabeceraLogo.php");
include("barralateral.php");

$cod = $_SESSION["usuario"];

// Consulta unificada para personas e instituciones
$sql = "SELECT * 
        FROM usuario u
        LEFT JOIN persona p ON u.codigo = p.codigo
        LEFT JOIN institucion i ON u.codigo = i.codigo
        LEFT JOIN datoespecifico d ON u.codigo = d.codigo
        WHERE u.codigo = '$cod'";

$f = mysqli_query($cn, $sql);
$r = mysqli_fetch_assoc($f);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .welcome-text {
            text-align: center;
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="radio"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .submit-container {
            text-align: center;
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #555;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #444;
        }

        .table-wrapper {
            width: 100%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        td {
            padding: 12px;
            border: 1px solid #ddd;
            font-size: 14px;
            color: #555;
        }

        td:first-child {
            font-weight: bold;
            width: 30%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Actualizar Datos</h1>
    <div class="welcome-text">
        Bienvenido(a)
        <?php 
        if ($r["tipo_usuario"] == '1') { // Institución
            echo "a la institución: " . $r["nombre"];
        } else { // Persona
            echo $r["nombre"] . " " . $r["apaterno"] . " " . $r["amaterno"];
        }
        ?>
    </div>

    <form action="p_actualizar.php" method="post">
        <div class="form-group">
            <label for="txtcorreo">Correo:</label>
            <input type="email" id="txtcorreo" name="txtcorreo" value="<?php echo $r["correo"]; ?>">
        </div>
        
        <div class="form-group">
            <label for="txtdireccion">Dirección:</label>
            <input type="text" id="txtdireccion" name="txtdireccion" value="<?php echo $r["direccion"]; ?>">
        </div>

        <div class="form-group">
            <label for="txtcelular">Celular:</label>
            <input type="text" id="txtcelular" name="txtcelular" value="<?php echo $r["telefono"]; ?>">
        </div>

        <?php if ($r["tipo_usuario"] != '1') { // Mostrar sexo solo si no es institución ?>
        <div class="form-group">
            <label>Sexo:</label>
            <div class="radio-group">
                <?php
                $valorM = $r["sexo"] == "M" ? "checked" : "";
                $valorF = $r["sexo"] == "F" ? "checked" : "";
                ?>
                <label><input type="radio" name="opcsexo" value="M" <?php echo $valorM; ?>> Masculino</label>
                <label><input type="radio" name="opcsexo" value="F" <?php echo $valorF; ?>> Femenino</label>
            </div>
        </div>
        <?php } ?>

        <div class="submit-container">
            <input type="submit" value="Actualizar Datos">
        </div>
    </form>
</div>

</body>
</html>
