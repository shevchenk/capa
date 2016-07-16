<script type="text/javascript">
var TipoRespuesta={
    AgregarEditar:function(AE){
        var datos=$("#form_tipo_respuesta").serialize().split("txt_").join("").split("slct_").join("");
        var accion="tiporespuesta/crear";
        if(AE==1){
            accion="tiporespuesta/editar";
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
                    TipoRespuesta.Cargar(CargarTipoRespuesta);
                    msjG.mensaje('success',obj.msj,4000);
                    $('#tipoRespuestaModal .modal-footer [data-dismiss="modal"]').click();
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
    Cargar:function(evento){
        $.ajax({
            url         : 'tiporespuesta/listar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                evento(obj.datos);
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje('danger','<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.',4000);
            }
        });
    },
    CambiarEstado:function(id,AD){
        $("#form_tipo_respuesta").append("<input type='hidden' value='"+id+"' name='id'>");
        $("#form_tipo_respuesta").append("<input type='hidden' value='"+AD+"' name='estado'>");
        var datos=$("#form_tipo_respuesta").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'tiporespuesta/cambiarestado',
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
                    TipoRespuesta.Cargar(CargarTipoRespuesta);
                    msjG.mensaje('success',obj.msj,4000);
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
    }
};
</script>
