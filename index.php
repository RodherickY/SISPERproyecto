<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación Electrónica</title>
  <style>
    /* Fondo con gradiente y transparencia */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                  url("img/fondo.jpg") no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      box-sizing: border-box;
    }

    /* Contenedor principal */
    .main-container {
      width: 90%;
      max-width: 700px;
      background-color: #0056ac;
      padding: 30px 20px;
      border-radius: 10px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      margin-bottom: 40px;
    }

    /* Opciones principales */
    .options {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }

    .option {
      width: 220px;
      background-color: #fff;
      color: #0056ac;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .option:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .option img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .option p {
      font-size: 14px;
      margin: 0;
      font-weight: bold;
      color: #0056ac;
    }

    /* Sección de inicio de sesión */
    .login-section {
      background-color: #fff;
      color: #0056ac;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .login-section p {
      margin: 0;
      font-size: 14px;
      font-weight: bold;
    }

    .btn-login {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #0056ac;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s, box-shadow 0.3s;
    }

    .btn-login:hover {
      background-color: #003d80;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="main-container">
    <h1>Bienvenidos al Proceso de Validación Electrónica<br>Proyecto Educativo Regional (PER)</h1>
    <p>El Programa registrará tus comentarios y aportes; y un grupo de especialistas los analizará para incorporarlos en la propuesta.</p>
    <div class="options">
      <div class="option">
        <a href="institucion.php">
          <img src="img/intitucion.png" alt="Institución Educativa">
          <p>Haz clic aquí si ingresas como<br><strong>Institución Educativa</strong></p>
        </a>
      </div>
      <div class="option">
        <a href="persona.php">
          <img src="img/persona.jpg" alt="Persona Individual">
          <p>Haz clic aquí si ingresas como<br><strong>Persona Individual</strong></p>
        </a>
      </div>
    </div>
    <div class="login-section">
      <p>¿Ya tienes una cuenta?</p>
      <a href="login.php" class="btn-login">Inicia sesión aquí</a>
    </div>
  </div>
</body>
</html>
