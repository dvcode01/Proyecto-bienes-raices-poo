<?php
namespace App;

class ActiveRecord{
    // base de  datos
    protected static $db;
    protected static $columnDB = [];
    protected static $tabla = '';

    // Propiedades
    public $id;
    public $imagen;

    // Errores
    protected static $errores = [];
    
    // definiendo conexion a DB
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if(!is_null($this->id)){
            // Actualizar
            $this->actualizar();
        }else{
            // Creando nuevo registro
            $this->crear();
        }
    }
    
    public function crear(){
        // sanitizar los datos
        $atributos = $this->sanitizarDatos();

        // Insertando en la base de datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("','", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if($resultado){
            // redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar(){
        // sanitizar los datos
        $atributos = $this->sanitizarDatos();
        $valores = []; 

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        if($resultado){
            // redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }

    // Elimina un registro
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        
        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    // identifica y une los atributos en la base de datos
    public function atributos(){
        $atributos = [];

        foreach(static::$columnDB as $columna){
            if($columna === 'id'){
                continue;
            }

            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }
    
    public function sanitizarDatos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
        
    }

    // subida de archivos
    public function setImagen($imagen){
        // Elimina imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }

        // asignarle al atributo de imagen, el nombre de la imagen 
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Eliminación de archivos
    public function borrarImagen(){
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // validacion de los datos
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    // lista de las propiedades
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Obtiene un numero determinado de propiedades
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca una propiedad por su ID
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla ." WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // consulta a DB
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];

        while($registroDB = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registroDB);
        }

        // liberar memoria y retornar resultado
        $resultado->free();
        return $array;
    }

    // Convierte el array asociativo en objetos
    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincroniza los objetos de memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}