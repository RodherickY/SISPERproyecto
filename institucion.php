<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Institución Educativa</title>
  <link rel="stylesheet" href="css/institucion.css">
</head>
<body>
  <div class="form-container">
    <h1>¡Gracias por compartir tu opinión para mejorar nuestra comunidad educativa!</h1>
    
    <form action="p_institucion.php" method="post">
      <label for="numinstitucion">1.- Nro de la Institución Educativa (*):</label>
      <input type="text" id="numinstitucion" name="numinstitucion" placeholder="Ejemplo: 12345" required>

      <label for="nombre">2.- Nombre de la Institución Educativa (*):</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>

      <label for="provincia">3.- Provincia (*):</label>
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

      <label for="director">4.- Director(a) responsable:</label>
      <input type="text" id="director" name="director" placeholder="Ejemplo: Juan Pérez">

      <fieldset>
        <legend>5.- Número de personas de la comunidad educativa que participaron (*):</legend>
        <label for="nalumnos">Nro. de Alumnos:</label>
        <input type="number" id="nalumnos" name="nalumnos" min="0" placeholder="Ejemplo: 50" required>

        <label for="ndocentes">Nro. de Docentes:</label>
        <input type="number" id="ndocentes" name="ndocentes" min="0" placeholder="Ejemplo: 10" required>

        <label for="nadministrativos">Nro. de Administrativos:</label>
        <input type="number" id="nadministrativos" name="nadministrativos" min="0" placeholder="Ejemplo: 5" required>
      </fieldset>

      <label for="contrasena">6.- Contraseña:</label>
      <input type="text" id="contrasena" name="contrasena" maxlength="8" placeholder="Máx. 8 caracteres">

      <button type="submit">Guardar Datos</button>
    </form>
  </div>
</body>
</html>
