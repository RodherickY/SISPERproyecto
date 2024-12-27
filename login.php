<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>SISPER</title>
</head>
<body>
    <center>
        <h1 style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.6); margin-top: 30px;">
            PROCESO DE VALIDACIÓN ELECTRÓNICA <br> PROYECTO EDUCATIVO REGIONAL
        </h1>
        <form action="p_login.php" method="post">
            <fieldset id="grupito">
                <center>
                    <h3 style="color: #0093E9; margin-bottom: 20px;">INICIAR SESIÓN</h3>
                    <input type="text" name="txtusuario" id="txt" placeholder="Usuario" autocomplete="off" maxlength="8">
                    <input type="password" name="txtpass" id="pwd" placeholder="Contraseña" autocomplete="off" maxlength="8">
                    <input type="submit" value="Iniciar Sesión" id="btn" style="background-color: #0093E9; color: white; border: none; border-radius: 5px; font-size: 18px;">
                </center>
            </fieldset>
        </form>
    </center>
</body>
</html>
