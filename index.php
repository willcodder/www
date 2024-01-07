<?php
$servername = "mysql-guillem.alwaysdata.net";
$username = "guillem";
$password = "Hola123*";
$dbname = "guillem_prova";
session_start();

# Verificar si los campos correo y clave están establecidos y no están vacíos
if (isset($_POST["correo"], $_POST["clave"]) && !empty($_POST["correo"]) && !empty($_POST["clave"])) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    # Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    # Escapar datos para prevenir inyecciones SQL
    $usuario = $conn->real_escape_string($_POST["correo"]);
    $contraseña = $conn->real_escape_string($_POST["clave"]);

    # Consulta para verificar usuario y contraseña
    $query = "SELECT * FROM usuarios WHERE correo = '$usuario' AND clave = '$contraseña'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        # Usuario y contraseña correctos, redirigir a home.html
        header('Location: tareas.php');
    } else {
        # Usuario o contraseña incorrectos, redirigir a indice2.html
        header('Location: indice2.html');
    }

    # Cerrar la conexión
    $conn->close();
} else {
    # Campos correo o clave no proporcionados o vacíos, redirigir a indice2.html
    header('Location: indice2.html');
}

$_SESSION["activo"] = "OK";
?>
