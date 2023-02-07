var tabla;

function init(){
    $("#paciente_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function(){ //Cuando el documento este cargado llamamos al datatable

    tabla=$('#Pacientes_data').dataTable({
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
        "ajax":{
            url: '../../controller/paciente.php?op=listar',
            type : "get",
            dataType : "json",
            data:function(data){
                console.log(data);
            },
            error: function(e){
                console.log(e.responseText);	
            }
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		}
	}).DataTable();

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#paciente_form")[0]);
    $.ajax({
        url: "../../controller/paciente.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#paciente_form')[0].reset();
            $("#modalpaciente").modal('hide');
            $('#Pacientes_data').DataTable().ajax.reload();

            swal.fire(
                'Registro!',
                'Se registro correctamente.',
                'success'
            )
        }
    });
}

function editar(idPaciente){
    $('#mdltitulo').html('Editar Registro');
    limpiaValoresModal();
    $.post("../../controller/paciente.php?op=mostrar",{idPaciente:idPaciente},function(data){
        data = JSON.parse(data); //Transforma la informacion de la varible "data" en un JSON
        $('#idPaciente').val(data.idPaciente); //Se llama a la variable "idPaciente"
        $('#idInflamacion').val(data.idInflamacion); //Se llama a la variable "idInflamacion"
        $('#nombrePac').val(data.nombrePac);
        $('#apellidoP').val(data.apellidoP);
        $('#apellidoM').val(data.apellidoM);
        $('#edad').val(data.edad);
        $('#Sexo_idSexo').val(data.Sexo_idSexo);
        $('#Ocupacion_idOcupacion').val(data.Ocupacion_idOcupacion);
        $('#telefono').val(data.telefono);
        $('#calleNumero').val(data.calleNumero);
        $('#colonia').val(data.colonia);
        $('#cp').val(data.cp);
        $('#ciudad').val(data.ciudad);
        $('#UsoAnteojosLC_idUsoAnteojosLC').val(data.UsoAnteojosLC_idUsoAnteojosLC);
        $('#tiempoUso').val(data.tiempoUso);
        $('#Localizacion_idLocalizacion').val(data.Localizacion_idLocalizacion);
        $('#sintomas').val(data.sintomas);
        $('#Inflamacion_idInflamacion').val(data.Inflamacion_idInflamacion);
        $('#alteracionesParpados').val(data.alteracionesParpados);
        $('#tratamiento').val(data.tratamiento);
        $('#fechaConsulta').val(data.fechaConsulta);
        $('#Colores_idColores').val(data.Colores_idColores);
        $('#Grado_idGrado').val(data.Grado_idGrado);
        $('#Rx_idRx').val(data.Rx_idRx);
        $('#AgudezaVisual_idAgudezaVisual').val(data.AgudezaVisual_idAgudezaVisual);
        $('#Localizacion_idLocalizacion').val(data.Localizacion_idLocalizacion);
        $('#Graduacion_idGraduacion').val(data.Graduacion_idGraduacion);
        $('#Paciente_idPaciente').val(data.Paciente_idPaciente);
        $('#UsoAnteojosLC_idUsoAnteojosLC').val(data.UsoAnteojosLC_idUsoAnteojosLC);
        $('#Refraccion_idRx').val(data.Refraccion_idRx);
        $('#oftalmoscopia').val(data.oftalmoscopia);
        $('#diagnosticoRefractivo').val(data.diagnosticoRefractivo);
        $('#especificaciones').val(data.especificaciones);
        $('#tipoPadecimiento_idtipoPadecimiento').val(data.tipoPadecimiento_idtipoPadecimiento);
        $('#descripcion').val(data.descripcion);
        $('#tratamientoPadecimiento').val(data.tratamientoPadecimiento);
    });

    $('#modalpaciente').modal('show');
}

function eliminar(idPaciente){
    swal.fire({
        title: "Consultorio Oftalmológo",
        text: "Desea eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonText: "Si",
        cancelButtonText: "No",
        reverseButtons: true
    }).then((result) => {
        if(result.isConfirmed){

            $.post("../../controller/paciente.php?op=eliminar",{idPaciente:idPaciente},function(data){

            });

            $("#Pacientes_data").DataTable().ajax.reload();

            swal.fire(
                'Eliminado!',
                'El registro se elimino correctamente ',
                'success'
            )
        }
    })

}


function limpiaValoresModal(){
    $('#idPaciente').val(''); //Se llama a la variable "idPaciente"
    $('#nombrePac').val('');
    $('#apellidoP').val('');
    $('#apellidoM').val('');
    $('#edad').val('');
    $('#Sexo_idSexo').val('');
    $('#Ocupacion_idOcupacion').val('');
    $('#telefono').val('');
    $('#calleNumero').val('');
    $('#colonia').val('');
    $('#cp').val('');
    $('#ciudad').val('');
    $('#UsoAnteojosLC_idUsoAnteojosLC').val('');
    $('#tiempoUso').val('');
    $('#Localizacion_idLocalizacion').val('');
    $('#Inflamacion_idInflamacion').val('');
    $('#alteracionesParpados').val('');
    $('#tratamiento').val('');
    $('#fechaConsulta').val('');
    $('#Colores_idColores').val('');
    $('#Grado_idGrado').val('');
    $('#Rx_idRx').val('');
    $('#AgudezaVisual_idAgudezaVisual').val('');
    $('#Localizacion_idLocalizacion').val('');
    $('#Graduacion_idGraduacion').val('');
    $('#Paciente_idPaciente').val('');
    $('#UsoAnteojosLC_idUsoAnteojosLC').val('');
    $('#Refraccion_idRx').val('');
    $('#oftalmoscopia').val('');
    $('#diagnosticoRefractivo').val('');
    $('#especificaciones').val('');
    $('#tipoPadecimiento_idtipoPadecimiento').val('');
    $('#descripcion').val('');
    $('#tratamientoPadecimiento').val('');
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#paciente_form')[0].reset();
    $('#idPaciente').val('');
    $('#modalpaciente').modal('show');
});

init();