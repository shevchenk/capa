<?php

class TipoRespuestaController extends \BaseController
{
    public function postListar()
    {
        if ( Request::ajax() ) {
            $r = TipoRespuesta::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$r));
        }
    }

    public function postCargar()
    {
        if ( Request::ajax() ) {
            $r = TipoRespuesta::getCargar();
            return Response::json(array('rst'=>1,'datos'=>$r));
        }
    }

    

    public function postCrear()
    {
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required.'|'.$regex,
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
            );

            $validator = Validator::make(Input::all(), $reglas, $mensaje);

            if ( $validator->fails() ) {
                return Response::json(
                    array(
                    'rst'=>2,
                    'msj'=>$validator->messages(),
                    )
                );
            }

            $tipoRespuesta = new TipoRespuesta;
            $tipoRespuesta['nombre'] = Input::get('nombre');
            $tipoRespuesta['tiempo'] = Input::get('tiempo');
            $tipoRespuesta['estado'] = Input::get('estado');
            $tipoRespuesta['usuario_created_at'] = Auth::user()->id;
            $tipoRespuesta->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                )
            );
        }
    }

    public function postEditar()
    {
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required.'|'.$regex,
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
            );

            $validator = Validator::make(Input::all(), $reglas, $mensaje);

            if ( $validator->fails() ) {
                return Response::json(
                    array(
                    'rst'=>2,
                    'msj'=>$validator->messages(),
                    )
                );
            }
            $tipoRespuestaId = Input::get('id');
            $tipoRespuesta = TipoRespuesta::find($tipoRespuestaId);
            $tipoRespuesta['nombre'] = Input::get('nombre');
            $tipoRespuesta['tiempo'] = Input::get('tiempo');
            $tipoRespuesta['estado'] = Input::get('estado');
            $tipoRespuesta['usuario_updated_at'] = Auth::user()->id;
            $tipoRespuesta->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );
        }
    }

    public function postCambiarestado()
    {
        if ( Request::ajax() ) {
            $tipoRespuestaId = Input::get('id');
            $tipoRespuesta = TipoRespuesta::find($tipoRespuestaId);
            $tipoRespuesta->estado = Input::get('estado');
            $tipoRespuesta->usuario_updated_at = Auth::user()->id;
            $tipoRespuesta->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );
        }
    }

}
