<?php
// Incluir archivos necesarios
include("conexion.php");
require_once('jpgraph/src/jpgraph.php');
require_once('jpgraph/src/jpgraph_bar.php');

// Configurar los grupos y cantidades iniciales
$grupos = ['0-17', '18-24', '25-34', '35-44', '45+'];
$cantidades = array_fill(0, count($grupos), 0);

// Consulta SQL
$sql = "
    SELECT 
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, p.fnacimiento, CURDATE()) BETWEEN 0 AND 17 THEN '0-17'
            WHEN TIMESTAMPDIFF(YEAR, p.fnacimiento, CURDATE()) BETWEEN 18 AND 24 THEN '18-24'
            WHEN TIMESTAMPDIFF(YEAR, p.fnacimiento, CURDATE()) BETWEEN 25 AND 34 THEN '25-34'
            WHEN TIMESTAMPDIFF(YEAR, p.fnacimiento, CURDATE()) BETWEEN 35 AND 44 THEN '35-44'
            WHEN TIMESTAMPDIFF(YEAR, p.fnacimiento, CURDATE()) >= 45 THEN '45+'
        END AS grupo_edad,
        COUNT(*) AS cantidad
    FROM persona p
    GROUP BY grupo_edad
    ORDER BY grupo_edad;
";

// Ejecutar la consulta y manejar errores
$result = mysqli_query($cn, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($cn));
}

// Procesar los resultados
while ($row = mysqli_fetch_assoc($result)) {
    $index = array_search($row['grupo_edad'], $grupos);
    if ($index !== false) {
        $cantidades[$index] = (int)$row['cantidad'];
    }
}

// Crear el gráfico
$grafico = new Graph(600, 400);
$grafico->SetScale("textlin");

// Configuración del gráfico
$grafico->title->Set('Sugerencias por Grupos de Edad');
$grafico->xaxis->title->Set('Grupo de Edad');
$grafico->yaxis->title->Set('Cantidad de Sugerencias');
$grafico->xaxis->SetTickLabels($grupos);
$grafico->xaxis->SetLabelAngle(45);



// Crear las barras
$barras = new BarPlot($cantidades);
$barras->SetFillColor('blue');
$barras->value->Show();
$barras->value->SetFormat('%d');

// Agregar las barras al gráfico
$grafico->Add($barras);

// Generar el gráfico (asegurarse de que no haya salida previa)
header('Content-Type: image/png');
$grafico->Stroke();
?>