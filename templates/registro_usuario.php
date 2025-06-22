<?php

session_start();
include("../bd/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = trim($_POST["idRegistro"]);
    $nombre = trim($_POST["Nombre"]);
    $apellido = trim($_POST["Apellido"]);
    $correo = trim($_POST["Correo"]);
    $clave = trim($_POST["Clave"]);
    $confirmarClave = trim($_POST["ConfirmarClave"]);

    // Validación básica
    if ($clave !== $confirmarClave) {
        $_SESSION['mensaje'] = "Las contraseñas no coinciden.";
        header("Location: personalizar.php");
        exit();
    }

    // Verificar si el correo ya está registrado
    $verificar = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $verificar->bind_param("s", $correo);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        $_SESSION['mensaje'] = "El correo ya está registrado.";
        header("Location: personalizar.php");
        exit();
    }

    // Insertar nuevo usuario
    $stmt = $conexion->prepare("INSERT INTO usuarios (id, nombre, apellido, correo, clave, confirmarClave) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $id, $nombre, $apellido, $correo, $clave, $confirmarClave);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Registro exitoso. Ya puede iniciar sesión.";
    } else {
        $_SESSION['mensaje'] = "Error al registrar. Intente de nuevo.";
    }

    header("Location: personalizacion.php");
    exit();

    $stmt->close();
    $verificar->close();
    $conexion->close();
}
?>