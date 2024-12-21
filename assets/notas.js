let url = "./backend/notasBack.php"

$('#nota1, #nota2, #nota3').on('keypress', function (event) {
    const keyCode = event.which || event.keyCode; // Obtener el código de la tecla
    if (keyCode < 48 || keyCode > 57) { // Permitir solo teclas numéricas (0-9)
        event.preventDefault(); // Evitar que se escriban caracteres no numéricos
        alert("El campo documento solo debe contener números enteros.");
    }
});

$('#boton1').on('click', function () {
    if ($('#nota1').val() === '' || $('#nota2').val() === '' || $('#nota3').val() === '' || $('#select_materia').val() === '') {

        alert("todos los campos deben estar llenos")

    } else {
        guardarNotas()
    }

})

$('#boton2').on('click', function () {
    if ($('#nota1').val() === '' || $('#nota2').val() === '' || $('#nota3').val() === '' || $('#select_materia').val() === '') {
        alert("todos los campos deben estar llenos")

    } else {
        actualizarNotas()
    }
})

$(document).ready(function () {
    selecMateria();
    imprimirNotas(3, 1, 5);
})

function selecMateria() {
    let formData = new FormData();
    formData.append('ind', '1');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#select_materia').empty();
            var htmlTags = '<option value="">Selecciona tu materia</option>';
            data.rta.forEach(function (item) {
                htmlTags += '<option value="' + item.id + '">' + item.nombre_materia + '</option>';
            });
            $('#select_materia').append(htmlTags);
        },
        error: function (error) {
            swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'error',
                title: 'Error al cargar lals materias'
            });
        }
    });
}

function guardarNotas() {

    let nota1 = parseFloat($('#nota1').val().trim());
    let nota2 = parseFloat($('#nota2').val().trim());
    let nota3 = parseFloat($('#nota3').val().trim());
    
    // Calcular el promedio
    let promedio = (nota1 + nota2 + nota3) / 3;

    // Verificar si alguna nota es mayor que 5
    if (nota1 > 5 || nota2 > 5 || nota3 > 5) {
        alert("Las notas tienen que ser menores o iguales a 5.");
        return;
    }

    let estado; // Declarar la variable fuera del if-else

    if (promedio >= 3) {
        estado = "Materia ganada";
    } else {
        estado = "Materia perdida";
    }
    
    // Obtener el id de la materia seleccionada
    let id_materias = $('#select_materia').val();
    
    // Realizar la solicitud AJAX
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '2',
            nota1: nota1,
            nota2: nota2,
            nota3: nota3,
            id_materias: id_materias,
            promedio: promedio,
            estado: estado
        }
    }).done(function (data) {
       
        if (data.rta == "ok") {

            alert("se guardo correctamente")

            $('#nota1').val('');
            $('#nota2').val('');
            $('#nota3').val('');
            $('#select_materia').val('');
            imprimirNotas(2, 1, 5);

        
    }

    }).fail(function (error) {
        alert("ha fallado la inserción")
    });


}

function imprimirNotas(ind, inicio, nroreg) {
    let nuevoinicio = (inicio - 1) * parseInt(nroreg);

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '3',
            nuevoinicio: nuevoinicio,
            nroreg: nroreg,
        }
    }).done(function (data) {

        $('#tablaNotas tbody').empty();
        $('#paginador').empty();

        let htmlTags = '';

        data.rta2.forEach(function (item) {
            htmlTags += ' <tr> ';
            htmlTags += '    <td>' + item.id + '</td>';
            htmlTags += '    <td>' + item.nota1 + '</td>';
            htmlTags += '    <td>' + item.nota2 + '</td>';
            htmlTags += '    <td>' + item.nota3 + '</td>';
            htmlTags += '    <td>' + item.promedio + '</td>';
            htmlTags += '    <td>' + item.nombre_materia + '</td>';
            htmlTags += '    <td>' + item.estado + '</td>';
            htmlTags += '    <td>';
            htmlTags += '         <span onclick="leerNotas(' + item.id + ');" style="cursor: pointer;">';
            htmlTags += '             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">';
            htmlTags += '                 <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />';
            htmlTags += '                 <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />';
            htmlTags += '             </svg>';
            htmlTags += '         </span>';
            htmlTags += '         <span  onclick="eliminarNotas(' + item.id + ');" style="cursor: pointer;">';
            htmlTags += '             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
            htmlTags += '                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />';
            htmlTags += '                 <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />';
            htmlTags += '             </svg>';
            htmlTags += '         </span>';
            htmlTags += '     </td>';
            htmlTags += ' </tr> ';
        });

        $('#tablaNotas tbody').append(htmlTags);

        let paginador = "";

        paginador = "";

        paginador += '<ul class="pagination justify-content-end">';

        paginador += '<li><span class="label label" style="font-size:13px; font-weight: bolder; background-color:white; color:#1346c9; border-radius:5px; border:solid 1px #1346c9; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">' + data.rta + ' Registros</li></span>';

        if (inicio > 1) {
            paginador += '<li><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)" onclick="imprimirNotas(\'3\', 1, ' + nroreg + ', \'\', \'\', \'\', \'\', \'\', \'\')">&laquo;</a></li>';
            paginador += '<li><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)" onclick="imprimirNotas(\'3\', ' + (inicio - 1) + ', ' + nroreg + ', \'\', \'\', \'\', \'\', \'\', \'\')">&lsaquo;</a></li>';

        } else {
            paginador += '<li class="disabled" ><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)">&laquo;</a></li>';
            paginador += '<li class="disabled" ><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)">&lsaquo;</a></li>';
        }
        let limit1 = inicio - nroreg;
        let limit2 = inicio + nroreg;

        if (inicio <= parseInt(nroreg)) {
            limit1 = 1;
        }
        if ((inicio + nroreg) >= Math.ceil(data.rta / parseInt(nroreg))) {
            limit2 = Math.ceil(data.rta / parseInt(nroreg));
        }
        for (let i = limit1; i <= limit2; i++) {
            if (i === inicio) {
                paginador += '<li class="active"><a style="background-color: #E5E5E5; border-color: #DFDFDF; font-size: 13px; font-weight: bold; color: #1346c9; padding: 8px 10px; border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)">' + i + '</a></li>';
            } else {
                paginador += '<li><a style="font-size: 13px; font-weight: bold; color: #1346c9; background-color: #FFFFFF; border: solid 1px #C0C0C0; padding: 8px 10px; border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)" onclick="imprimirNotas(\'3\', ' + i + ', ' + nroreg + ', \'\', \'\', \'\', \'\', \'\', \'\')">' + i + '</a></li>';
            }

        }
        if (inicio < Math.ceil(data.rta / parseInt(nroreg))) {
            paginador += '<li><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)" onclick="imprimirNotas(\'3\', ' + (inicio + 1) + ', ' + nroreg + ',\'\',\'\',\'\',\'\',\'\',\'\')">&rsaquo;</a></li>';
            paginador += '<li><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)" onclick="imprimirNotas(\'3\', ' + Math.ceil(data.rta / nroreg) + ', ' + nroreg + ', \'\',\'\',\'\',\'\',\'\',\'\')">&raquo;</a></li>';
        } else {
            paginador += '<li class="disabled"><a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)">&rsaquo;</a></li>';
            paginador += '<li class="disabled"><a a a style="font-size: 13px; font-weight: bolder; color: #1346c9; background-color: white; border-radius: 5px; border: solid 1px #C0C0C0; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);" href="javascript:void(0)">&raquo;</a></li>';
        }
        paginador += '<li><span class="label label" style="font-size:13px; font-weight: bolder; background-color:white; color:#1346c9; border-radius:5px; border:solid 1px #1346c9; padding: 8px 10px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">' + Math.ceil(data.rta / parseInt(nroreg)) + ' Páginas</span></li>';

        paginador += '</ul>';

        $("#paginador").append(paginador);


    }).fail(function (error) {
        alert("error al mostrar los datos")
    });

}

function leerNotas(id) {
    $('#boton5').addClass('d-none');
    $('#boton4').addClass('d-none');
    $('#boton3').addClass('d-none');
    $('#boton2').removeClass('d-none');
    $('#boton1').addClass('d-none');

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '4',
            id: id
        },
    }).done(function (data) {

        $('#notasid').val(data.rta.id);
        $('#nota1').val(data.rta.nota1);
        $('#nota2').val(data.rta.nota2);
        $('#nota3').val(data.rta.nota3);
        $('#select_materia').val(data.rta.id_materias);


    }).fail(function (error) {
        alert("error al leer los datos")
    })

}

function actualizarNotas() {

    let id = $('#notasid').val();

     let nota1 = parseFloat($('#nota1').val().trim());
    let nota2 = parseFloat($('#nota2').val().trim());
    let nota3 = parseFloat($('#nota3').val().trim());


    let promedio = (nota1 + nota2 + nota3) / 3;

    let id_materias = $('#select_materia').val();


    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '5',
            id: id,
            nota1: nota1,
            nota2: nota2,
            nota3: nota3,
            id_materias: id_materias,
            promedio: promedio

        }
    }).done(function (data) {

        if (data.rta === "ok") {

            alert("se ha actualizado correctamente")

            $('#notasid').val('');
            $('#nota1').val('');
            $('#nota2').val('');
            $('#nota3').val('');
            $('#select_materia').val("");

            imprimirNotas(2, 1, 5);


            $('#boton2').addClass('d-none');
            $('#boton1').removeClass('d-none');
            $('#boton3').removeClass('d-none');
            $('#boton4').removeClass('d-none');
            $('#boton5').removeClass('d-none');
        }
    }).fail(function (error) {
        alert("ha fallado en la actualizacion")
    });
}

function eliminarNotas(id) {

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '6',
            id: id
        },
    }).done(function (data) {

        if (data.rta == "ok") {

            alert("se ha eliminado las notas")
            imprimirNotas(2, 1, 5);

        }

    }).fail(function (error) {

        alert("error al eliminar las notas")
    })
}
