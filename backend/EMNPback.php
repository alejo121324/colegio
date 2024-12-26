<?php
include '../assets/config.php';

$indicador = $_POST['ind'];


if ($indicador == '1') {


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

if ($indicador == "2") {
    
    
    
    $id_Nombre = $_POST['id_Nombre'];
    


    $query = "INSERT INTO estudiantes (id_nombre) 
                VALUES (:id_materias)";

    $qry= $inicioRegistrodb ->prepare($query);

    
    $qry -> bindParam(":id_Nombre", $id_materias, PDO::PARAM_INT);
   

    if ($qry->execute()) {
        $rta = "ok";
    }else{
        $rta = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(Array('rta' => $rta));

}

if ($indicador == '3') {
    // Verificar si se recibió el valor seleccionado
    if (!isset($_POST['valorSeleccionado']) || empty($_POST['valorSeleccionado'])) {
        echo json_encode(array('error' => 'El valor seleccionado no se recibió correctamente'));
        exit;
    }

    $valorSeleccionado = $_POST['valorSeleccionado'];

    try {
        // Consulta para contar los estudiante
        // Consulta para obtener los datos de un estudiante específico
        $query2 = "SELECT e.*, n.estado, m.nombre_materia, p.nombre AS nombre_profesor  FROM estudiantes e

        INNER JOIN notas n ON e.id = n.id_estudiante
        INNER JOIN materias m ON m.id = n.id_materias
        LEFT JOIN profesores p ON p.id = m.id_profesor
         WHERE e.id = :id ORDER BY id";
        $qry2 = $inicioRegistrodb->prepare($query2);
        $qry2->bindParam(":id", $valorSeleccionado, PDO::PARAM_INT);
        $qry2->execute();
        $rta2 = $qry2->fetchAll(PDO::FETCH_OBJ);

        // Respuesta JSON
        $response = array('rta2' => $rta2);
        header('Content-Type: application/json');
        echo json_encode($response);

    } catch (PDOException $e) {
        // Manejo de errores
        echo json_encode(array('error' => 'Error en la consulta: ' . $e->getMessage()));
        exit;
    }
}

