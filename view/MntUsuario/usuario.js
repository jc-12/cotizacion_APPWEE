var tabla;

function init(){
    $("#mnt_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#mnt_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#mnt_form')[0].reset();
            /* TODO:Ocultar Modal */
            $("#mdlmnt").modal('hide');
            $('#lista_data').DataTable().ajax.reload();
 
            swal({
                title: "Sistema dice!",
                text: "Registro Guardado.",
                icon: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
 }
 
function editar(usu_id){
    $('#mdltitulo').html('Editar Registro');

    $.ajax({
        url: "../../controller/usuario.php?op=mostrar",
        data: { usu_id: usu_id },
        type: "POST",
        dataType: "json",
        beforeSend: function() {
            //TODO: Aquí puedes mostrar el modal de carga
            $('#mdlcarga').modal('show');
        },
        success: function(data) {
            setTimeout(function() {
                //TODO: Aquí puedes ocultar el modal de carga y actualizar los valores
                $('#mdlcarga').modal('hide');
                $('#usu_id').val(data.usu_id);
                $('#usu_correo').val(data.usu_correo);
                $('#usu_nombre').val(data.usu_nombre);
                $('#usu_pass').val(data.usu_pass);

                $('#mdlmnt').modal('show');
            }, 2000);
        },
        error: function() {
            //TODO: Aquí puedes ocultar el modal de carga y mostrar un mensaje de error
            $('#mdlcarga').modal('hide');
        }
    });
}

function eliminar(usu_id){
    swal({
        title: 'Eliminar Registro?',
        text: 'Esta seguro de eliminar el registro!',
        icon: 'error',
        buttons: {
            cancel: {
            text: 'Cancelar',
            value: null,
            visible: true,
            className: 'btn btn-default',
            closeModal: true,
            },
            confirm: {
            text: 'Eliminar',
            value: true,
            visible: true,
            className: 'btn btn-danger',
            closeModal: true
            }
        }
    }).then((isConfirm) => {
        if (isConfirm) {
            $.ajax({
            url: "../../controller/usuario.php?op=eliminar",
            type: "POST",
            data: { usu_id: usu_id },
            beforeSend: function() {
                //TODO: Mostrar el modal de espera aquí
                $('#mdlcarga').modal('show');
            },
            success: function(data) {
                //TODO: Ocultar el modal de espera aquí
                setTimeout(function() {
                    //TODO: Ocultar el modal de espera aquí
                    $('#mdlcarga').modal('hide');

                    swal({
                        title: "Sistema dice",
                        text: "Registro Eliminado.",
                        icon: "success",
                        confirmButtonClass: "btn-success"
                    });
                    //TODO: Manejar la respuesta del servidor aquí
                }, 2000);
                //TODO: Manejar la respuesta del servidor aquí
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Ocultar el modal de espera aquí
                $('#mdlcarga').modal('hide');
                //TODO: Manejar el error aquí
            }
            });

            $('#lista_data').DataTable().ajax.reload();
        }
    });
}


$(document).ready(function(){
    tabla=$('#lista_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/usuario.php?op=listar',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
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

$(document).on("click","#btnnuevo", function(){
    $('#mnt_form')[0].reset();
    $('#mdltitulo').html('Nuevo Registro');
    $('#mdlmnt').modal('show');
});

init();
