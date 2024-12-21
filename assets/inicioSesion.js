let url = "./backend/inicioBack.php"

$('#boton2').on('click', function () {
    if ($('#correo').val() === '' || $('#contraseña').val() === '') {

        alert("todos los campos deben estar llenos")

    } else {
        inicioSesion()
    }

})

function inicioSesion() {

    let correo = $('#correo').val();
    let contrasena = $('#contrasena').val();

    $.ajax({

        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '1',   
        }
    }).done(function (data) {
        let usuarioEncontrado = false;

        // Recorrer los usuarios recibidos
        for (let i = 0; i < data.rta.length; i++) {
            if (data.rta[i].correo === correo && data.rta[i].contrasena === contrasena) {

                alert("Bienvenido " + data.rta[i].usuario)

                usuarioEncontrado = true;
                window.location.href = "vistaEstudiantes.php";
                break; // Salir del bucle si encontramos el usuario
            }
        }

        if (!usuarioEncontrado) {
            alert("Credenciales incorrectas");
        }

    }).fail(function (error) {
        alert("Error al iniciar sesión");
    });
}
