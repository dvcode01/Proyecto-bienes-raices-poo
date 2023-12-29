<?php 
    // Sesiones
    require '../../includes/app.php';
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    verificarAutenticacion();

    $propiedad = new Propiedad;

    // Consulta para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con posibles mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecuta el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // crea una nueva instancia
        $propiedad = new Propiedad($_POST['propiedad']);

        // generacion de nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        // setear imagen
        // Realiza un resize a la image con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }
        
        // validar errores
        $errores = $propiedad->validar();
        
        // revisa que el arreglo de errores este vacio para enviar formulario
        if(empty($errores)){
            // Crear carpeta para guardar imagenes
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }

            // guarda imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            // guarda en base de datos
            $resultado = $propiedad->guardar();
        }    
    }
    
    // Configura las rutas de los templates
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin/" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):  ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php';  ?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>


    <?php incluirTemplate('footer'); ?>