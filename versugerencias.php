<?php

//include("cabecera.php");
include("conexion.php");

include("cabeceraLogo.php");
include("barralateral.php");

$codigo = $_GET["codigo"];

$sql = "SELECT * FROM sugerencia WHERE codigo = '$codigo'";
$result = mysqli_query($cn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias del Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .content {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            text-align: left;
            padding: 12px;
        }

        table th {
            background-color:rgb(114, 114, 114);
            color: #ffffff;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .message {
            text-align: center;
            padding: 20px;
            background-color: #ffefef;
            color: #d9534f;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="content">
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Sugerencias realizadas por el usuario con código: $codigo</h3>";
            echo "<table border='1'>";
            echo "<tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                  </tr>";
            $contador = 0;

            while ($r = mysqli_fetch_assoc($result)) {
                $contador++;
                echo "<tr>
                        <td>" . $contador . "</td>
                        <td>{$r['tipo']}</td>
                        <td>{$r['descripcion']}</td>
                        <td>{$r['fecha']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='message'>
                    <h3>El usuario con código: $codigo todavía no ha realizado sugerencias.</h3>
                  </div>";
        }
        ?>
    </div>
</body>
</html>