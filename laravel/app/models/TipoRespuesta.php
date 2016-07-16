<?php

class TipoRespuesta extends Base
{
    public $table = "tipos_respuesta";
    public static $where =['id', 'nombre', 'tiempo', 'estado'];
    public static $selec =['id', 'nombre', 'tiempo', 'estado'];

    public static function getCargar(){
        $sql="SELECT id,nombre,tiempo,estado
              FROM tipos_respuesta
              where estado=1";

        $r= DB::select($sql);
        return $r;
    }
}
