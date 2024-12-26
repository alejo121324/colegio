<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Materias</title>
    <style>
        
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>

</head>
<body>

<a href="vistaInicio.php" class="btn btn-danger logout-btn" id="botonLogout">Cerrar sesión</a>

<div class="container mt-5">
    <h2 class="text-center">Formulario para el registro de las materias</h2>

        <div class="mb-3"> 
            <input type="text" class="form-control d-none" id="materiasid">
            <label class="form-label">nombre de la materia:</label>
            <input type="text" id="materia" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label ">profesor:</label>
            <select class="form-control mb-3"   id="id_profesor">
        </div>

        <div class="mb-3"> 
            <input type="text" class="form-control d-none" id="m">
            <label class="form-label">duracion:</label>
            <input type="text" id="duracion" class="form-control">
        </div>

       

        <button class="btn btn-success mb-3" id="boton1">Guardar</button>
        
        <button class="btn btn-success d-none" id="boton2">Actualizar</button>

        <a href="vistaEstudiantes.php" class="btn btn-success mb-3" id="boton3">Registro estudiantes</a>

        <a href="vistaNotas.php" class="btn btn-success mb-3" id="boton4">Registro notas</a>

        <a href="vistaProfesores.php" class="btn btn-success mb-3" id="boton5">Registro Profesores</a>

        <a href="vistaEMNP.php" class="btn btn-primary" id="boton6">Inicio</a>

    <h2 class="mt-5">Materias registradas</h2>

 
    <table class="table table-bordered mt-3" id="table-materias">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre de la materia</th>
                <th>profesor de la materia</th>
                <th>duracion de la clase</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="paginador"></div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="assets/materias.js"></script>


</body>
</html>