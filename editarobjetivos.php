<?php
include("conexion.php");

$tipo = $_GET['tipo']; 
$id = intval($_GET['id']);

switch ($tipo) {
    case 'objetivo':
        $tabla = 'objetivos';
        $columnaId = 'idobjetivo';
        $columnaDescripcion = 'descripcion';
        break;
    case 'resultado':
        $tabla = 'resultado';
        $columnaId = 'idresultado';
        $columnaDescripcion = 'descripcion';
        break;
    case 'politica':
        $tabla = 'politica';
        $columnaId = 'idpolitica';
        $columnaDescripcion = 'descripcion';
        break;
    case 'medida':
        $tabla = 'medida';
        $columnaId = 'idmedida';
        $columnaDescripcion = 'descripcion';
        break;
    default:
        die("Tipo inválido.");
}

$sql = "SELECT $columnaDescripcion FROM $tabla WHERE $columnaId = $id";
$result = mysqli_query($cn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $descripcionActual = $row[$columnaDescripcion];
} else {
    die("Elemento no encontrado.");
}

mysqli_close($cn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar <?php echo ucfirst($tipo); ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin: 10px 0 20px;
        }

        p strong {
            color: #000;
        }

        p i {
            font-style: italic;
            color: #666;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        textarea:focus {
            border-color: #007bff;
            background-color: #ffffff;
            outline: none;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-save {
            background-color: #28a745;
            color: white;
        }

        .btn-save:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar <?php echo ucfirst($tipo); ?></h2>

        <form action="p_editarobjetivo.php" method="POST">
            <label>Ha seleccionado un(a) <?php echo ucfirst($tipo); ?>:</label>
            <p><strong>La información actual es:</strong></p>
            <p><i><?php echo $descripcionActual; ?></i></p>
            
            <label for="descripcion">Nueva información:</label>
            <textarea id="descripcion" name="descripcion"><?php echo htmlspecialchars($descripcionActual); ?></textarea>

            <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="btn-container">
                <button type="submit" class="btn-save">Guardar</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='objetivo1admin.php';">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
