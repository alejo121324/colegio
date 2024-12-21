<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .input-group-text {
            background-color: #f8f9fa;
        }
    </style>

    
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Registrarse</h4>
                </div>
                <div class="card-body">
         
                     
                        <div class="form-group">
                            <label for="nombreCompleto">Nombre Completo</label>
                            <input type="text" placeholder="Tu nombre completo" class="form-control" autofocus id="nombreCompleto" name="nombreCompleto" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" placeholder="Nombre de usuario" class="form-control" id="usuario" name="usuario" required>
                        </div>
                      
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" placeholder="Gmail" class="form-control" id="correo" name="correo" required>
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" placeholder="Contraseña" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                        </div>
                        
                        <button  class="btn btn-primary btn-block" id="boton1">Registrarse</button>
                   
                    <div class="mt-3 text-center">
                        <p>¿Ya tienes una cuenta? <a href="vistaInicio.php">Inicia sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/registro.js"></script>
</body>
</html>
