<?php
    require '../../includes/app.php';
    use App\Vendedor;

    verificarAutenticacion();
    
    // Validar ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    // Obtener el arreglo de vendedor
    $vendedor = Vendedor::find($id);
    

    // Arreglo con posibles mensajes de errores
    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Asignar los valores del objeto 
        $args = $_POST['vendedor'];

        // Sincroniza el objeto en memoria con lo que el usuario escribe
        $vendedor->sincronizar($args);
        
        // Validar los campos
        $errores = $vendedor->validar();
        
        
        if(empty($errores)){
            $vendedor->guardar();
        }
    }

    // Configura las rutas de los templates
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>
        <a href="/admin/" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):  ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST">
            <?php include '../../includes/templates/formulario_vendedores.php';  ?>
            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>
    </main>


    <?php incluirTemplate('footer'); ?>
