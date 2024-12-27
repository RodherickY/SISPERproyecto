<?php
include("conexion.php");

$num_institucion = $_POST['numinstitucion'];
$nombre = $_POST['nombre'];
$provincia = $_POST['provincia'];
$director = $_POST['director'];
$nalumnos = $_POST['nalumnos'];
$ndocentes = $_POST['ndocentes'];
$nadministrativos = $_POST['nadministrativos'];
$contra2 = $_POST["contrasena"];

$query_check_institucion = "SELECT * FROM institucion WHERE codigo = '$num_institucion'";
$result = mysqli_query($cn, $query_check_institucion);

if (mysqli_num_rows($result) > 0) {

    echo "<script>
        alert('La institucion ya se encuentra registrada.');
        window.location.href = 'index.php';
    </script>";
    exit();
}


$query_institucion = "INSERT INTO institucion(codigo, nombre, provincia, director, nalumnos, ndocentes, nadministrativos, fregistro) 
                      VALUES ('$num_institucion', '$nombre', '$provincia', '$director', $nalumnos, $ndocentes, $nadministrativos, NOW())";
mysqli_query($cn, $query_institucion);

$query_usuario = "INSERT INTO usuario(codigo, tipo_usuario, password) 
                  VALUES ('$num_institucion', 1, '$contra2')";
mysqli_query($cn, $query_usuario);

$query_especifico = "INSERT INTO datoespecifico(codigo) VALUES ('$num_institucion')";
mysqli_query($cn, $query_especifico);


header('Location: index.php');
?>
