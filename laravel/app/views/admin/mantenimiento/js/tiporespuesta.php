<script type="text/javascript">
$(document).ready(function() {  
    TipoRespuesta.Cargar(CargarTipoRespuesta);
    $('#tipoRespuestaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Tipo Respuesta');
      $('#form_tipo_respuesta [data-toggle="tooltip"]').css("display","none");
      $("#form_tipo_respuesta input[type='hidden']").remove();

        if(titulo=='Nuevo'){
            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_tipo_respuesta #slct_estado').val(1); 
            $('#form_tipo_respuesta #txt_nombre').focus();
        }
        else{
            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_tipo_respuesta #txt_nombre').val( $('#t_tipo_respuesta #nombre_'+button.data('id') ).text() );
            $('#form_tipo_respuesta #slct_tiempo').val( $('#t_tipo_respuesta #tiempo_'+button.data('id') ).attr("data-tiempo") );
            $('#form_tipo_respuesta #slct_estado').val( $('#t_tipo_respuesta #estado_'+button.data('id') ).attr("data-estado") );
            $("#form_tipo_respuesta").append("<input type='hidden' value='"+button.data('id')+"' name='id'>");
        }

    });

    $('#tipoRespuestaModal').on('hide.bs.modal', function (event) {
      var modal = $(this); //captura el modal
      modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});

Editar=function(){
    if(validarForm()){
        TipoRespuesta.AgregarEditar(1);
    }
};

activar=function(id){
    TipoRespuesta.CambiarEstado(id,1);
};
desactivar=function(id){
    TipoRespuesta.CambiarEstado(id,0);
};

Agregar=function(){
    if(validarForm()){
        TipoRespuesta.AgregarEditar(0);
    }
};

CargarTipoRespuesta=function(datos){
    var htm="";
    var estadohtml="";
    var tiempo_des="";
    //$('#t_tipo_respuesta').dataTable().fnDestroy();
    $.each(datos,function(index,data){

        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        tiempo_des='No';
        if(data.tiempo==1){
            estadohtml='Si';
        }

        htm+="<tr>"+
            "<td id='nombre_"+data.id+"'>"+data.nombre+"</td>"+
            "<td id='tiempo_"+data.id+"' data-tiempo='"+data.tiempo+"'>"+tiempo_des+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tipoRespuestaModal" data-id="'+data.id+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';
        htm+="</tr>";
        $("#tb_tipo_respuesta").append(htm); 
    });
    alert(htm);
    //$("#tb_tipo_respuesta").html(htm); 
}

validarForm=function(){
    var r=true;
    if( $.trim($("#txt_nombre").val())=='' ){
        r=false;
        alert('Ingrese Nombre');
    }
    else if( $.trim($("#slct_tiempo").val())=='' ){
        r=false;
        alert('Seleccione si requiere tiempo');
    }
    return r;
};
</script>
