<?php
session_start();
include("../bd/conexion.php");

    // Buscar ID del usuario
    $stmtUser = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmtUser->bind_param("s", $correo);
    $stmtUser->execute();
    $stmtUser->bind_result($id);
    $stmtUser->fetch();
    $stmtUser->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $nombre = $_POST['medicamento'];
    $presentacion = $_POST['presentacion'];
    $categoria = $_POST['categoria'];

    // Insertar tratamiento
    $sql = "INSERT INTO medicamentos (id, correo, nombre, presentacion, categoria) VALUES (?, ?, ?, ?, ?)";
    $stmtInsert = $conexion->prepare($sql);

    if (!$stmtInsert) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmtInsert->bind_param("sssss", $id, $correo, $nombre, $presentacion, $categoria);
    $stmtInsert->execute();
    $stmtInsert->close();

    // Redirigir al ver tratamientos
    header("Location: personalizacion.php");
    exit();
} else {
    header("Location: tratamiento.php");
    exit();
}
?>