



<!DOCTYPE html>
<html>
  <head>
    <title>Solicitud de préstamo de computadora</title>
    <style>
      /* Estilos para el encabezado */
      header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
      }
      /* Estilos para el formulario */
      form {
        border: 2px solid #ccc;
        padding: 20px;
        width: 400px;
        margin: 0 auto;
      }
      /* Estilos para los campos de entrada */
      input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      /* Estilos para el botón de envío */
      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
      }
      /* Estilos para el botón de cancelar */
      input[type=button] {
        background-color: #f44336;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
      }
      /* Estilos para los mensajes de error */
      .error {
        color: red;
        font-style: italic;
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Solicitud de préstamo de computadora</h1>
    </header>
    <form>
      <label for="nombre">Nombre completo:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre completo...">
      <label for="correo">Correo electrónico:</label>
      <input type="text" id="correo" name="correo" placeholder="Ingrese su correo electrónico...">
      <label for="fecha">Fecha de préstamo:</label>
      <input type="date" id="fecha" name="fecha">
      <label for="duracion">Duración del préstamo:</label>
      <select id="duracion" name="duracion">
        <option value="1">1 día</option>
        <option value="2">2 días</option>
        <option value="3">3 días</option>
        <option value="4">4 días</option>
        <option value="5">5 días</option>
      </select>
      <label for="computadora">Computadora a prestar:</label>
      <select id="computadora" name="computadora">
        <option value="1">Computadora 1</option>
        <option value="2">Computadora 2</option>
        <option value="3">Computadora 3</option>
      </select>
      <div class="error">Ingrese todos los campos obligatorios.</div>
      <input type="button" value="Cancelar">
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>
