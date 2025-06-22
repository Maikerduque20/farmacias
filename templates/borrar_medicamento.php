<?php
// eliminar_tratamiento.php
include("../bd/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tratamiento_id'])) {
        $id = intval($_POST['tratamiento_id']);

        // Consulta de eliminación
        $sql = "DELETE FROM medicamentos WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tratamiento eliminado exitosamente.";
            header("Location: personalizacion.php");
        } else {
            echo "Error al eliminar: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo "ID de tratamiento no recibido.";
    }
} else {
    echo "Acceso no permitido.";
}
?>