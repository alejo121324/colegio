<?php
include '../assets/config.php';

$indicador = $_POST['ind'];


if ($indicador == '1') {

 $query = "SELECT * FROM materias";

 $qry = $inicioRegistrodb->prepare($query);


 if ($qry->execute()) {
    $rta = $qry->fetchAll(PDO::FETCH_OBJ);
 }else{
    $rta = "error";
  }

 header('Content-Type: application/json');
 echo json_encode(Array('rta' => $rta));
}

if ($indicador == "2") {
    
    $id_estudiante = $_POST['id_estudiante'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $id_materias = $_POST['id_materias'];
    $promedio = $_POST['promedio'];
    $estado = $_POST['estado'];


    $query = "INSERT INTO notas (id_estudiante, nota1, nota2, nota3, id_materias, promedio, estado ) 
                VALUES (:id_estudiante, :nota1, :nota2, :nota3, :id_materias, :promedio, :estado)";

    $qry= $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(":id_estudiante", $id_estudiante, PDO::PARAM_INT);
    $qry -> bindParam(":nota1", $nota1, PDO::PARAM_INT);
    $qry -> bindParam(":nota2", $nota2, PDO::PARAM_INT);
    $qry -> bindParam(":nota3", $nota3, PDO::PARAM_INT);
    $qry -> bindParam(":id_materias", $id_materias, PDO::PARAM_INT);
    $qry -> bindParam(":promedio", $promedio, PDO::PARAM_INT);
    $qry -> bindParam(":estado", $estado, PDO::PARAM_STR);

    if ($qry->execute()) {
        $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));

}

if ($indicador == '3') {

    $nuevoinicio = isset($_POST['nuevoinicio']) ? $_POST['nuevoinicio'] : "";
    $nroreg = isset($_POST['nroreg']) ? $_POST['nroreg'] : "";

    $query = "SELECT COUNT(id) AS count from notas";
    $qry = $inicioRegistrodb->prepare($query);
    $qry->execute();
    $count = $qry->fetch(PDO::FETCH_ASSOC)['count'];

    $query2 = "SELECT n.*, m.nombre_materia, e.nombre FROM notas n
    INNER JOIN materias m ON n.id_materias = m.id
    INNER JOIN estudiantes e ON n.id_estudiante = e.id
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

if ($indicador == '4') {

    $id = $_POST['id'];

    $query = "SELECT * FROM notas WHERE id = :id";

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

if($indicador == '5') {

    $id = $_POST['id'];
    $nota1 =  $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $id_materias = $_POST['id_materias'];
    $id_estudiante = $_POST['id_estudiante'];
    $promedio = $_POST['promedio'];

    $query = "UPDATE notas SET nota1 = :nota1, nota2 = :nota2, nota3 = :nota3, id_materias = :id_materias, id_estudiante = :id_estudiante, promedio = :promedio WHERE id = :id";

    $qry= $inicioRegistrodb ->prepare($query);

    $qry -> bindParam(':id', $id, PDO::PARAM_INT);
    $qry -> bindParam(':nota1', $nota1, PDO::PARAM_INT);
    $qry -> bindParam(':nota2', $nota2, PDO::PARAM_INT);
    $qry -> bindParam(':nota3', $nota3, PDO::PARAM_INT);
    $qry -> bindParam(':id_materias', $id_materias, PDO::PARAM_INT);
    $qry -> bindParam(':id_estudiante', $id_estudiante, PDO::PARAM_INT);
    $qry -> bindParam(':promedio', $promedio, PDO::PARAM_INT);

    if ($qry->execute()) {
       $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
}

if ($indicador == '6') {
    
    $id = $_POST['id'];

    $query = "DELETE  FROM  notas WHERE id = :id";

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

if ($indicador == '7') {

    $query = "SELECT * FROM estudiantes";
   
    $qry = $inicioRegistrodb->prepare($query);
   
   
    if ($qry->execute()) {
       $rta = $qry->fetchAll(PDO::FETCH_OBJ);
    }else{
       $rta = "error";
     }
   
    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));
   }
   










