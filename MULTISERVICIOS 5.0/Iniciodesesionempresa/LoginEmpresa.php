<?php
// Incluye el archivo de conexión a la base de datos
include("../admin/bd.php");

// Función para manejar el registro de datos

// Verifica si se ha enviado un dato llamado 'nombre' a través de POST
if(isset($_POST['nombre'])) {
    // Obtiene los valores de POST
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $documento_identidad = $_POST['documento_identidad'];

    try{
        $sentencia=$conexion->prepare("CALL pa_Registro_Usuario ( '" . $nombre ."', " . $telefono . " , '" . $email . " ', '" . $direccion . "' , " . $documento_identidad . " , '" . $password . "' )");
        $sentencia->execute();
        // Mensaje de éxito
        echo "Registro exitoso.";
    } catch(PDOException $error){
        // En caso de error, muestra el mensaje de error
        echo "Error: " . $error->getMessage();
    }
} else {
    // Si no se recibió 'nombre', muestra un mensaje de error
    echo "Error: No se recibió ningún dato.";
}
?>
