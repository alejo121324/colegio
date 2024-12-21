<?php
include '../assets/config.php';

$indicador = $_POST['ind'];

if ($indicador == '1') {
    
    $nombre_completo = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $query = "INSERT INTO usuarios (nombre_completo, usuario, correo, contrasena ) 
                VALUES (:nombre_completo, :usuario, :correo, :contrasena)";

    $qry = $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
    $qry -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $qry -> bindParam(':correo', $correo, PDO::PARAM_STR);
    $qry -> bindParam(':contrasena', $contraseña, PDO::PARAM_STR);

    if ($qry->execute()) {
        $rta = "ok";
    } else {
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));

}

if ($indicador == '2') {
    $nombre_completo = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];

    try {
        // Verificar si el usuario o correo ya existe
        $checkQuery = "SELECT COUNT(*) as count FROM usuarios WHERE usuario = :usuario OR correo = :correo";
        $checkStmt = $inicioRegistrodb->prepare($checkQuery);
        $checkStmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $checkStmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $checkStmt->execute();
        $result = $checkStmt->fetch(PDO::FETCH_ASSOC)['count'];

       if ($result == 0) { 
            echo json_encode(Array('rtaMensaje' => $result));
        } else {
            echo json_encode(Array('rtaCheck' => $result));
        }

    } catch (PDOException $e) {
        echo json_encode(Array('rta' => 'error', 'mensaje' => 'Error interno: ' . $e->getMessage()));
    }
}
