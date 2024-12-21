let url = "./backend/registroBack.php"

$('#boton1').on('click', function () {
    if ($('#nombre').val() === '' || $('#usuario').val() === '' || $('#correo').val() === '' || $('#contraseña').val() === '') {

        alert("todos los campos deben estar llenos")

    } else {
        usuariosRepetidos();
    }

})

function guardarUsuarios() {

    let nombre_completo = $('#nombreCompleto').val();
    let usuario = $('#usuario').val();
    let correo = $('#correo').val();
    let contraseña = $('#contrasena').val();

    $.ajax({

        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '1',
            nombre: nombre_completo,
            usuario: usuario,
            correo: correo,
            contraseña: contraseña
        }
    }).done(function (data) {
        if (data.rta == "ok") {

            alert("Registrado correctamente")

            $('#nombreCompleto').val('');
            $('#usuario').val('');
            $('#correo').val('');
            $('#contrasena').val('');

            window.location.href = "vistaInicio.php";
        }

    }).fail(function (error) {
        alert("ha fallado la inserción")
    });


}

function usuariosRepetidos() {

    let nombre_completo = $('#nombreCompleto').val();
    let usuario = $('#usuario').val();
    let correo = $('#correo').val();
    -

        $.ajax({

            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                ind: '2',
                nombre: nombre_completo,
                usuario: usuario,
                correo: correo,

            }
        }).done(function (data) {

            if (data.rtaCheck > 0 ) {
                alert("usuario ya existente");

                return;
            }else {
                guardarUsuarios()
            }
        }).fail(function (error) {

            alert("Error en la comunicación con el servidor.");
        })


}