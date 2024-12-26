let url = "./backend/EMNPback.php"

$('#botonmodal').on('click', function () {
    $('#modal').modal('show');

    let valorSeleccionado = $('#select_estudiantes').val();


    imprimirDatos(valorSeleccionado)
})

$(document).ready(function () {
    selecEstudiante();
})

function selecEstudiante() {
    let formData = new FormData();
    formData.append('ind', '1');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#select_estudiantes').empty();
            var htmlTags = '<option value="">Selecciona el Estudiante</option>';
            data.rta.forEach(function (item) {
                htmlTags += '<option value="' + item.id + '">' + item.nombre + '</option>';
            });
            $('#select_estudiantes').append(htmlTags);
        },
        error: function (error) {
            swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'error',
                title: 'Error al cargar los estudiantes'
            });
        }
    });
}

function guardarEstudiantes() {
    
    let id_Nombre = $('#select_estudiantes').val();
    
    
    // Realizar la solicitud AJAX
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '2',
    
            id_Nombre: id_Nombre,
            
            
        }
    }).done(function (data) {
       
        if (data.rta == "ok") {

            alert("se guardo correctamente")

            imprimirDatos();

        
    }

    }).fail(function (error) {
        alert("ha fallado la inserción")
    });


}

function imprimirDatos(valorSeleccionado) {

    console.log(valorSeleccionado);
    
   
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            ind: '3',
            valorSeleccionado: valorSeleccionado
        }
    }).done(function (data) {


        $('#table_estudiantes tbody').empty();
       
        let htmlTags = '';

        data.rta2.forEach(function (item) {
            htmlTags += ' <tr> ';
            htmlTags += '    <td>' + item.id + '</td>';
            htmlTags += '    <td>' + item.nombre + '</td>';
            htmlTags += '    <td>' + item.documento + '</td>';
            htmlTags += '    <td>' + item.nombre_profesor + '</td>';
            htmlTags += '    <td>' + item.nombre_materia + '</td>';
            htmlTags += '    <td>' + item.estado + '</td>';
            htmlTags += '    <td>';
            htmlTags += ' </tr> ';
        });

        $('#table_estudiantes tbody').append(htmlTags);

        

    }).fail(function (error) {
        alert("error al mostrar los datos")
    });

}
