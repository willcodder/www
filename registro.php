<?php
// Conexión a la base de datos
$servername = "mysql-guillem.alwaysdata.net";
$username = "guillem";
$password = "Hola123*";
$dbname = "guillem_prova";

$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Comprobar si algún campo está vacío
if (empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['nombre']) || empty($_POST['apellido'])) {
    // Redirigir al usuario a "indice2.html" si algún campo está vacío
    header('Location: registro_campo.html');
    exit;
}

// Comprobar si el correo ya está en uso
$sql = "SELECT * FROM usuarios WHERE correo = '" . $_POST['email'] . "'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    // Redirigir al usuario a "indice2.html" si el correo ya está en uso
    header('Location: registro_correo.html');
    exit;
}

// Comprobar si el usuario ya está en uso
$sql = "SELECT * FROM usuarios WHERE usuario = '" . $_POST['usuario'] . "'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    // Redirigir al usuario a "indice2.html" si el correo ya está en uso
    header('Location: registro_usuario.html');
    exit;
}

// Encriptar la contraseña
$claveEncriptada = password_hash($_POST['clave'], PASSWORD_DEFAULT);

// Preparar la consulta SQL para la inserción
$sql = "INSERT INTO usuarios (correo, usuario, clave, nom, cognom) VALUES ('" . $_POST['email'] . "', '" . $_POST['usuario'] . "', '" . $claveEncriptada ."', '". $_POST['nombre'] ."', '". $_POST['apellido'] . "')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
    header('Location: registro_exitoso.html'); // Redirigir al usuario a la página de tareas
} else {
    echo "Error al insertar datos: " . $conexion->error;
}

// ... (tu código de conexión y verificación anterior)

// Comprobar si algún campo está vacío
if (empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['nombre']) || empty($_POST['apellido'])) {
    // Redirigir al usuario a "indice2.html" si algún campo está vacío
    header('Location: indice2.html');
    exit;
}

// Suponiendo que el registro fue exitoso y que tienes la dirección de correo electrónico en $email_usuario
$email_usuario = $_POST['email'];
$nombre_usuario = $_POST['nombre']; // Suponiendo que también recoges el nombre del usuario

// El mensaje
$mensaje = "Hola " . $nombre_usuario . ",\n\nGracias por registrarte en nuestro sitio. Estamos encantados de tenerte con nosotros.";

// Si estás utilizando HTML en tu correo electrónico, asegúrate de cambiar el tipo de contenido a text/html
$cabeceras = 'From: guillem@alwaysdata.net' . "\r\n" .
    'Reply-To: guillem@alwaysdata.net' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Enviar el correo
$exito = mail($email_usuario, "Gracias por registrarte", $mensaje, $cabeceras);

if ($exito) {
    echo "Correo de agradecimiento enviado.";
} else {
    echo "No se pudo enviar el correo de agradecimiento.";
}

// ... (el resto de tu código de registro)

// Cerrar la conexión
$conexion->close();
?>


