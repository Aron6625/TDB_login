<!DOCTYPE html>
<html>
<head>
  <title>Prestamos de Computadoras</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    tr:hover {
      background-color: #f5f5f5;
    }
    
    .btn {
      padding: 6px 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    
    #file-upload {
      display: none;
    }
    
    #file-label {
      display: inline-block;
      padding: 6px 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Prestamos de Computadoras</h1>
  
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Computadora</th>
        <th>Imagen</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Estudiante 1</td>
        <td>Apellido 1</td>
        <td>
          <select>
            <option value="Computadora 1">Computadora 1</option>
            <option value="Computadora 2">Computadora 2</option>
            <!-- Agrega más opciones según sea necesario -->
          </select>
        </td>
        <td><input type="file" id="file-upload" accept="image/*"><label for="file-upload" id="file-label">Cargar Imagen</label></td>
        <td><button class="btn">Asignar</button></td>
      </tr>
      <tr>
        <td>Estudiante 2</td>
        <td>Apellido 2</td>
        <td>
          <select>
            <option value="Computadora 1">Computadora 1</option>
            <option value="Computadora 2">Computadora 2</option>
            <!-- Agrega más opciones según sea necesario -->
          </select>
        </td>
        <td><input type="file" id="file-upload" accept="image/*"><label for="file-upload" id="file-label">Cargar Imagen</label></td>
        <td><button class="btn">Asignar</button></td>
      </tr>
      <!-- Agrega más filas según sea necesario -->
    </tbody>
  </table>
  
  <script>
    // Obtener el nombre del archivo seleccionado y mostrarlo en la etiqueta del botón
    document.getElementById('file-upload').addEventListener('change', function(e) {
      var fileName = e.target.files[0].name;
      document.getElementById('file-label').textContent = fileName;
    });
  </script>
</body>
</html>
