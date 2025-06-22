<?php

session_start();
include("../bd/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["Correo"]);
    $clave = trim($_POST["Clave"]);

    $stmt = $conexion->prepare("SELECT correo, clave FROM usuarios WHERE correo = ? AND clave = ?");
    $stmt->bind_param("ss", $correo, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        session_start();
        $usuario = $resultado->fetch_assoc();
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nombre"] = $usuario["nombre"];
        header("Location: personalizacion.php");
        exit();
    } else {
        $_SESSION['mensaje'] = "Correo o contraseña incorrectos.";
            header("Location: personalizar.php");
            exit();
    }

    $stmt->close();
    $conexion->close();
}
?>