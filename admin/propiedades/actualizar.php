<?php 
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    verificarAutenticacion();

    // Vallida la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: /admin");
    }

    // Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consulta para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con posibles mensajes de errores
    $errores = $propiedad->getErrores();

    // Ejecuta el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // asignar los atributos
        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);

        // Validación
        $errores = $propiedad->validar();

        // Subida de archivos
        // generacion de nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        // revisa que el arreglo de errores este vacio para enviar formulario
        if(empty($errores)){
            if($_FILES['propiedad']['tmp_name']['imagen']){
                // Almacenar imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }

            $propiedad->guardar();
        }
        
    }
    
    // Configura las rutas de los templates
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar</h1>
        <a href="/admin/" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):  ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php';  ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>


    <?php incluirTemplate('footer'); ?>