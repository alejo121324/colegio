<?php
include '../assets/config.php';

$indicador = $_POST['ind'];

if ($indicador == "1") {
    
    
    $nombre_materia = $_POST['nombre'];
    $id_profesor = $_POST['id_profesor'];
    $duracion_clase = $_POST['duracion'];

    $query = "INSERT INTO materias (nombre_materia, id_profesor, duracion ) 
                VALUES (:nombre_materia, :id_profesor, :duracion)";

    $qry= $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(":nombre_materia", $nombre_materia, PDO::PARAM_STR);
    $qry -> bindParam(":id_profesor", $id_profesor, PDO::PARAM_INT);
    $qry -> bindParam(":duracion", $duracion_clase, PDO::PARAM_STR);

    if ($qry->execute()) {
        $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));

}

if ($indicador == '2') {

    $nuevoinicio = isset($_POST['nuevoinicio']) ? $_POST['nuevoinicio'] : "";
    $nroreg = isset($_POST['nroreg']) ? $_POST['nroreg'] : "";

    $query = "SELECT COUNT(id) AS count from materias";
    $qry = $inicioRegistrodb->prepare($query);
    $qry->execute();
    $count = $qry->fetch(PDO::FETCH_ASSOC)['count'];

    $query2 = "SELECT m.*, p.nombre FROM materias m
     INNER JOIN profesores p ON m.id_profesor = p.id
    ORDER BY id ASC LIMIT :nuevoinicio, :nroreg";

    $qry2 = $inicioRegistrodb->prepare($query2);
    $qry2->bindParam(":nuevoinicio", $nuevoinicio, PDO::PARAM_INT);
    $qry2->bindParam(":nroreg", $nroreg, PDO::PARAM_INT);
    $qry2->execute();
    $rta2 = $qry2->fetchAll(PDO::FETCH_OBJ);

    $response = array('rta' => $count, 'rta2' => $rta2);
    header('Content-Type: application/json');
    echo json_encode($response);
}

if ($indicador == '3') {

    $id = $_POST['id'];

    $query = "SELECT * FROM materias WHERE id = :id";

    $qry = $inicioRegistrodb->prepare($query);
    $qry->bindParam(":id", $id, PDO::PARAM_INT);
    
    if ($qry->execute()) {
        $rta = $qry->fetch(PDO::FETCH_OBJ);
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
}

if($indicador == '4') {

    $id = $_POST['id'];
    $nombre_materia =  $_POST['materia'];
    $id_profesor = $_POST['id_profesor'];
    $duracion_clase = $_POST['duracion'];


    $query = "UPDATE materias SET nombre_materia = :nombre_materia, id_profesor = :id_profesor, duracion = :duracion WHERE id = :id";

    $qry= $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(':id', $id, PDO::PARAM_INT);
    $qry -> bindParam(':nombre_materia', $nombre_materia, PDO::PARAM_STR);
    $qry -> bindParam(':id_profesor', $id_profesor, PDO::PARAM_INT);
    $qry -> bindParam(':duracion', $duracion_clase, PDO::PARAM_STR);

    if ($qry->execute()) {
       $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
}

if ($indicador == '5') {
    
    $id = $_POST['id'];

    $query = "DELETE  FROM  materias WHERE id = :id";

    $qry = $inicioRegistrodb->prepare($query);
    $qry->bindParam(":id", $id, PDO::PARAM_INT);
    
    if ($qry->execute()) {
       $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));

}

if ($indicador == '6') {

    $query = "SELECT * FROM profesores";
   
    $qry = $inicioRegistrodb->prepare($query);
   
   
    if ($qry->execute()) {
       $rta = $qry->fetchAll(PDO::FETCH_OBJ);
    }else{
       $rta = "error";
     }
   
    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
   }