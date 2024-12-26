<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Registro de Profesores</title>
  <style>
        
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center">
  
<a href="vistaInicio.php" class="btn btn-danger logout-btn" id="botonLogout">Cerrar sesión</a>
<div class="container py-4">
    <div class="row g-4 mt-5">
      <!-- Formulario de registro -->
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Registrar Profesor</h2>
              <div class="mb-3">
              <input type="text" class="form-control d-none" id="profesoresid">

                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" class="form-control" placeholder="Ingrese el nombre" required>
              </div>
             
              <div class="mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" id="documento" class="form-control" placeholder="Ingrese el documento" required>
              </div>
              <button id="boton1"  class="btn btn-success mb-3 w-100 mb-4 ">Registrar</button>
       
        <button class="btn btn-success d-none" id="boton2">Actualizar</button>

        <a href="vistaEstudiantes.php" class="btn btn-success mb-3" id="boton3">Registro estudiantes</a>

        <a href="vistaNotas.php" class="btn btn-success mb-3" id="boton4">Registro notas</a>

        <a href="vistaMaterias.php" class="btn btn-success mb-3" id="boton5">Registro materias</a>

        <a href="vistaEMNP.php" class="btn btn-primary" id="boton6">Inicio</a>




          </div>
        </div>
      </div>

      <!-- Tabla de registros -->
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Profesores Registrados</h2>
            <table class="table table-bordered"id="tablaProfesores">
              <thead class="table-light">
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Documento</th>
                </tr>
              </thead>
              <tbody >
                <!-- Filas dinámicas -->
              </tbody>
            </table>
            <div id="paginador"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/profesores.js"></script>


</body>
</html>