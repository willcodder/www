<?php

// Conexión a la base de datos (reemplaza los valores con los tuyos)
$servername = "mysql-guillem.alwaysdata.net";
$username = "guillem";
$password = "Hola123*";
$dbname = "guillem_prova";

$conexion = new mysqli($servername, $username, $password, $dbname);
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Tareas </title>

    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>
<body>
<!-- ... Otras partes de tu código ... -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #334D8F;">
  <div class="container-fluid justify-content-center">
    <!-- Dropdown -->
    <div class="dropdown">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; background-color: #1c49bc; border: none;">
        <?php
        // Muestra el nombre de usuario o @Usuario si no hay sesión.
        echo isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : 'Usuario';
        ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Configurar Usuario</a>
        <a class="dropdown-item" href="index2.html">Cerrar Sesión</a>
      </div>
    </div>
  </div>
</nav>
<!-- ... Resto de tu código ... -->

<style>
    body{ background-color: #334D8F; color: white;}
</style>

<style>
    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Esto hace que el contenedor ocupe toda la altura de la vista */
    }
  
    .bigger-input {
      width: 100%; /* Cambia este valor según tus necesidades */
      font-size: 2em; /* Aumenta el tamaño de la fuente */
    }
  
    label, .form-check-label {
      font-size: 1.5em; /* Aumenta el tamaño de la fuente de las etiquetas */
    }
    .form-control form-control-sm {
        width: 100%; /* Cambia este valor según tus necesidades */
      font-size: 2em; /* Aumenta el tamaño de la fuente */

    }
  </style>
  <div class="form-container">
    <form>
        <div class="form-group">
            <label for="exampleInputUser">Tarea 01 </label>
            <input type="email" class="form-control bigger-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tarea...">
          </div>
          <div class="mb-3 text-center">
            <label for="taskDate" class="form-label">Fecha de realización</label>
            <input class="form-control form-control-sm" type="date" id="taskDate">
          </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Tarea Realizada</label>
      </div>
      <div class="form-group">
        <label for="exampleInputUser">Tarea 02 </label>
        <input type="email" class="form-control bigger-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tarea...">
      </div>
      <div class="mb-3 text-center">
        <label for="taskDate" class="form-label">Fecha de realización</label>
        <input class="form-control form-control-sm" type="date" id="taskDate">
      </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Tarea Realizada</label>
  </div>
  <div class="form-group">
    <label for="exampleInputUser">Tarea 03 </label>
    <input type="email" class="form-control bigger-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tarea...">
  </div>
  <div class="mb-3 text-center">
    <label for="taskDate" class="form-label">Fecha de realización</label>
    <input class="form-control form-control-sm" type="date" id="taskDate">
  </div>
<div class="form-group form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Tarea Realizada</label>
</div>
      <button type="submit" class="btn btn-primary bigger-input">Guardar Tareas</button>
    </form>
  </div>
  
  <!-- Al final del documento, justo antes de la etiqueta de cierre </body> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</body>
</html>
