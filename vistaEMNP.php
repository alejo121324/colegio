<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista con Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <input type="text" class="form-control w-75" placeholder="Buscar Estudiante">
            <a href="vistaInicio.php" class="btn btn-danger logout-btn" id="botonLogout">Cerrar sesión</a>
        </div>
        
        <!-- Título -->
        <h1 class="text-center mb-4">Informacion Estudiantes</h1>
        
        <!-- Contenido -->
        <div class="row">
            <!-- Tabla -->
            <div class="col-lg-8 mb-3">
                <table class="table table-bordered ">
                    <thead class="table-light">
                        <tr>
                            <th>Estudiantes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-11">
                                        <select class="form-control"  id="select_estudiantes"></select>
                                    </div>
                                
                                    <div class="col-1">
                                        <button id="botonmodal"class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Botones laterales -->
            <div class="col-lg-4 d-flex flex-column">
            <a href="vistaEstudiantes.php" class="btn btn-success mb-3" id="boton1">Registro estudiantes</a>
            <a href="vistaMaterias.php" class="btn btn-success mb-3" id="boton2">Registro materias</a>
            <a href="vistaNotas.php" class="btn btn-success mb-3" id="boton3">Registro notas</a>
            <a href="vistaProfesores.php" class="btn btn-success mb-3" id="boton4">Registro Profesores</a>

            </div>
        </div>
    </div>
    

    <div class="modal" id="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered mt-3" id="table_estudiantes">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Profesor</th>
                <th>Materia</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="assets/EMNP.js"></script>
</body>
</html>

</body>
</html>