<?php
include '../assets/config.php';

$indicador = $_POST['ind'];

if ($indicador == '1') {
    


    $query = "SELECT u.correo, u.contrasena, u.usuario FROM usuarios u";


    $qry = $inicioRegistrodb->prepare($query);
    
    if ( $qry->execute()) {
        $rta = $qry->fetchAll(PDO::FETCH_OBJ);
    }else {
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));

}
