<script type="text/javascript">
var Detalles={
    AgregarEditarDetalles:function(AE){
        var datos=$("#form_detalles").serialize().split("txt_").join("").split("slct_").join("");
        var accion="tiporespuestadetalle/crear";
        if(AE==1){
            accion="tiporespuestadetalle/editar";
        }

        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {                
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {                
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    Detalles.CargarDetalles(CargarDetallesHTML);
                    msjG.mensaje('success',obj.msj,4000);
                    $('#detalleModal .modal-footer [data-dismiss="modal"]').click();
                }
                else{ 
                    $.each(obj.msj,function(index,datos){                        
                        $("#error_"+index).attr("data-original-title",datos);
                        $('#error_'+index).css('display','');                                         
                    });     
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje('danger','<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.',4000);
            }
        });
    },
    CargarDetalles:function(evento){
        $.ajax({
            url         : 'tiporespuestadetalle/listar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    evento(obj.datos);
                } 
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje('danger','<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.',4000);
            }
        });
    },
    cargarTipoRespuesta:function(accion,tiporespuesta_id){
        $.ajax({
            url         : 'tiporespuesta/cargar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : {estado:1},
            success : function(obj) {
                if(obj.rst==1){
                    $('#slct_tiporespuesta_id').html('');
                    $.each(obj.datos,function(index,data){
                        $('#slct_tiporespuesta_id').append('<option value='+data.id+'>'+data.nombre+'</option>');
                    });
                    if (accion==='nuevo')
                        $('#slct_tiporespuesta_id').append("<option selected style='display:none;'>--- Elige Respuesta ---</option>");
                    else
                       $('#slct_tiporespuesta_id').val( tiporespuesta_id );
                } 
            }
        });
    },
    CambiarEstadoDetalles:function(id,AD){
        $("#form_detalles").append("<input type='hidden' value='"+id+"' name='id'>");
        $("#form_detalles").append("<input type='hidden' value='"+AD+"' name='estado'>");
        var datos=$("#form_detalles").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'tiporespuestadetalle/cambiarestado',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {                
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    Detalles.CargarDetalles(CargarDetallesHTML);
                    msjG.mensaje('success',obj.msj,4000);
                    $('#detalleModal .modal-footer [data-dismiss="modal"]').click();
                }
                else{ 
                    $.each(obj.msj,function(index,datos){
                        $("#error_"+index).attr("data-original-title",datos);
                        $('#error_'+index).css('display','');
                    });     
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje('danger','<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.',4000);
            }
        });
    },
};
</script>
