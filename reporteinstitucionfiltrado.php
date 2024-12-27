<?php
include("conexion.php");
include("cabeceraLogo.php");
include("barralateral.php");

if (!isset($_GET['codigo'])) {
    die("<div class='error'>Error: Código no especificado.</div>");
}

$codigo = mysqli_real_escape_string($cn, $_GET['codigo']);

$sql = "SELECT i.*, d.* 
        FROM institucion i 
        LEFT JOIN datoespecifico d ON i.codigo = d.codigo 
        WHERE i.codigo = '$codigo'";

$result = mysqli_query($cn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // Datos de la institución
    ?>
     <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles de Institución</title>
        <style>
            .container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #f9f9f9;
                border: 1px solid #ccc;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .title {
                text-align: center;
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            .table td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }
            .table tr:nth-child(odd) {
                background-color: #f4f4f4;
            }
            .table tr:hover {
                background-color: #eaeaea;
            }
            .center {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="title">Detalles de la Institución</h2>
            <table class="table">
                <tr>
                    <td><strong>Nombre:</strong></td>
                    <td><?php echo $row['nombre']; ?></td>
                </tr>
                <tr>
                    <td><strong>Director:</strong></td>
                    <td><?php echo $row['director']; ?></td>
                </tr>
                <tr>
                    <td><strong>Provincia:</strong></td>
                    <td><?php echo $row['provincia']; ?></td>
                </tr>
                <?php if (isset($row['direccion'])) { ?>
                <tr>
                    <td><strong>Dirección:</strong></td>
                    <td><?php echo $row['direccion']; ?></td>
                </tr>
                <?php } ?>
                <?php if (isset($row['telefono'])) { ?>
                <tr>
                    <td><strong>Teléfono:</strong></td>
                    <td><?php echo $row['telefono']; ?></td>
                </tr>
                <?php } ?>
            </table>
            <div class="center">
                <button onclick="window.history.back();" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Volver</button>
            </div>
        </div>
    </body>
    </html>
<?php
} else {
    echo "<div style='text-align: center; color: red; margin-top: 50px;'>Institución no encontrada.</div>";
}
?>