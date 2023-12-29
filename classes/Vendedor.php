<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        if(!$this->nombre ){
            self::$errores[] = 'Debes añadir el nombre del Vendedor(a)';
        }

        if(!$this->apellido ){
            self::$errores[] = 'Debes añadir el apellido del Vendedor(a)';
        }

        if(!$this->telefono){
            self::$errores[] = 'El Teléfono es obligatorio';
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = 'El Teléfono no tiene un formato válido';
        }

        return self::$errores;
    }
}