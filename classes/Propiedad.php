<?php 

namespace App;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d') ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar(){
        if(!$this->titulo ){
            self::$errores[] = 'Debes añadir el titulo de la propiedad';
        }

        if(!$this->precio ){
            self::$errores[] = 'El precio es obligatorio';
        }

        if(strlen($this->descripcion) < 50){
            self::$errores[] = 'La descripción es obligatoria y debe tener como minimo 50 caracteres';
        }

        if(!$this->habitaciones){
            self::$errores[] = 'El número de habitaciones es obligatorio';
        }
    
        if(!$this->wc){
            self::$errores[] = 'El número de baños es obligatorio';
        }

        if(!$this->estacionamiento){
            self::$errores[] = 'El número de estacionamientos es obligatorio';
        }

        if(!$this->vendedorId){
            self::$errores[] = 'Debes elegir un vendedor';
        }

        if(!$this->imagen){
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }
    
}