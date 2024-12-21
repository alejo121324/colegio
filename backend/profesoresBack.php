<?php
include '../assets/config.php';

$indicador = $_POST['ind'];

if ($indicador == "1") {

    
    $nombre = $_POST['nombre'];
    $materia_que_da = $_POST['materia'];
    $documento = $_POST['documento'];

    $query = "INSERT INTO profesores (nombre, materia_que_da, documento )
    VALUES (:nombre, :materia_que_da, :documento )";

    $qry = $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $qry -> bindParam(':materia_que_da', $materia_que_da, PDO::PARAM_STR);
    $qry -> bindParam(':documento', $documento, PDO::PARAM_INT);

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

    $query = "SELECT COUNT(id) AS count from profesores";
  
    $qry = $inicioRegistrodb->prepare($query);
    $qry->execute();
    $count = $qry->fetch(PDO::FETCH_ASSOC)['count'];

    $query2 = "SELECT * FROM profesores ORDER BY id ASC LIMIT :nuevoinicio, :nroreg";

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

    $query = "SELECT * FROM profesores WHERE id = :id";

    $qry = $inicioRegistrodb->prepare($query);

    $qry->bindParam(":id", $id,PDO::PARAM_INT);

    if ($qry->execute()) {
        $rta = $qry->fetch(PDO::FETCH_OBJ);
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
}

if ($indicador == '4') {

    $id = $_POST['id'];
    $nombre =  $_POST['nombre'];
    $materia_que_da = $_POST['materia_que_da'];
    $documento = $_POST['documento'];

    $query ="UPDATE profesores SET nombre = :nombre, materia_que_da = :materia_que_da, documento = :documento WHERE id = :id";

    $qry= $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(':id', $id, PDO::PARAM_INT);
    $qry -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $qry -> bindParam(':materia_que_da', $materia_que_da, PDO::PARAM_STR);
    $qry -> bindParam(':documento', $documento, PDO::PARAM_INT);

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

    $query = "DELETE  FROM profesores WHERE id = :id";

    $qry = $inicioRegistrodb->prepare($query);
    $qry->bindparam(":id", $id, PDO::PARAM_INT);

    if ($qry->execute()) {
        $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
}