<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Notas</title>
    <!-- Puedes agregar un enlace a tu archivo CSS o usar Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <div class="container mt-4">
        <h2 class="text-center">Registro de Notas</h2>
        
            
            <!-- Campos para las notas -->
            <div class="mb-3">
                <input type="number" class="d-none" id="notasid">
                <label for="nota1" class="form-label">Nota 1</label>
                <input type="number" class="form-control" id="nota1" min="0" max="10" required>
            </div>
            <div class="mb-3">
                <label for="nota2" class="form-label">Nota 2</label>
                <input type="number" class="form-control" id="nota2" min="0" max="10" required>
            </div>
            <div class="mb-3">
                <label for="nota3" class="form-label">Nota 3</label>
                <input type="number" class="form-control" id="nota3" min="0" max="10" required>
            </div>
            <div class="mb-4">
                <label for="nota3" class="form-label">Materia</label>
                <select class="form-control"   id="select_materia">

                </select>
            </div>


            
            <!-- Botón para agregar los datos -->
            <button type="button" class="btn btn-primary" id="boton1">Guardar</button>

            <button class="btn btn-success d-none" id="boton2">Actualizar</button>

            <a href="vistaEstudiantes.php" class="btn btn-primary" id="boton3">Registrar estudiantes</a>

            <a href="vistaMaterias.php" class="btn btn-primary" id="boton4">Registrar materias</a>

            <a href="vistaProfesores.php" class="btn btn-primary" id="boton5">Registro Profesores</a>
       

        <h3 class="mt-4">Notas Registradas</h3>
        <!-- Tabla para mostrar los registros -->
        <table class="table table-striped mt-2" id="tablaNotas">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Promedio</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán las filas con los registros -->
            </tbody>
        </table>
        <div id="paginador"></div>
    </div>

    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/notas.js"></script>
</body>
</html>