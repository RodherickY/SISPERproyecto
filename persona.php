<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Persona</title>
  <link rel="stylesheet" href="css/institucion.css">
</head>
<body>
  <div class="form-container">
    <h1>¡Gracias por animarte a compartir tu opinión y aportes!</h1>
    
    <form action="p_persona.php" method="post">
      <label for="dni">1.- DNI (*):</label>
      <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI" required>

      <label for="nombre">2.- Nombre (*):</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>

      <label for="apaterno">3.- Apellido Paterno (*):</label>
      <input type="text" id="apaterno" name="apaterno" placeholder="Ingrese su apellido paterno" required>

      <label for="amaterno">4.- Apellido Materno (*):</label>
      <input type="text" id="amaterno" name="amaterno" placeholder="Ingrese su apellido materno" required>

      <label for="fnacimiento">5.- Fecha de nacimiento:</label>
      <input type="date" id="fnacimiento" name="fnacimiento">

      <label for="provincia">6.- Provincia (*):</label>
      <select id="provincia" name="provincia" required>
        <option value="" disabled selected>Seleccione una provincia</option>
        <option value="Barranca">Barranca</option>
        <option value="Huaral">Huaral</option>
        <option value="Cañete">Cañete</option>
        <option value="Huaura">Huaura</option>
        <option value="Oyon">Oyon</option>
        <option value="Cajatambo">Cajatambo</option>
        <option value="Yauyos">Yauyos</option>
        <option value="Huarochiri">Huarochiri</option>
        <option value="Canta">Canta</option>
      </select>

      <label for="contrasena">7.- Contraseña:</label>
      <input type="text" id="contrasena" name="contrasena" maxlength="8" placeholder="Máx. 8 caracteres">

      <button type="submit">Guardar Datos</button>
    </form>
  </div>
</body>
</html>
