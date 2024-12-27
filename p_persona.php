<?php
include("conexion.php");

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$fnacimiento = $_POST['fnacimiento'];
$provincia = $_POST['provincia'];
$contra2 = $_POST["contrasena"];

$query_check_dni = "SELECT * FROM persona WHERE codigo = '$dni'";
$result = mysqli_query($cn, $query_check_dni);

if (mysqli_num_rows($result) > 0) {

    echo "<script>
        alert('El DNI ya se encuentra registrado.');
        window.location.href = 'index.php';
    </script>";
    exit();
}

$query_persona = "INSERT INTO persona (codigo, nombre, apaterno, amaterno, fnacimiento, provincia, fregistro) 
                  VALUES ('$dni', '$nombre', '$apaterno', '$amaterno', '$fnacimiento', '$provincia', NOW())";
mysqli_query($cn, $query_persona);

$query_usuario = "INSERT INTO usuario (codigo, tipo_usuario, password) 
                  VALUES ('$dni', 2, '$contra2')";
mysqli_query($cn, $query_usuario);

$query_datoespecifico = "INSERT INTO datoespecifico (codigo) VALUES ('$dni')";
mysqli_query($cn, $query_datoespecifico);

header('Location: index.php');
?>
