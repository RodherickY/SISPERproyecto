<?php

//include("auth.php");
//include("cabecera.php");

include("cabeceraLogo.php");
include("barralateral.php");


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
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

        .note {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cambiar Contraseña</h1>
    <form action="p_cambiarcontrasena.php" method="post">
        <div class="form-group">
            <label for="txtpass">Nueva Contraseña:</label>
            <input type="password" id="txtpass" name="txtpass" maxlength="8">
        </div>

        <div class="form-group">
            <label for="txtrepass">Repetir Nueva Contraseña:</label>
            <input type="password" id="txtrepass" name="txtrepass" maxlength="8">
        </div>

        <div class="submit-container">
            <input type="submit" value="Cambiar Contraseña">
        </div>
    </form>
    <p class="note">La contraseña debe tener un máximo de 8 caracteres.</p>
</div>

</body>
</html>
