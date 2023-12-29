<?php
    require '../../includes/app.php';
    use App\Vendedor;

    verificarAutenticacion();

    $vendedor = new Vendedor;

    // Consulta para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con posibles mensajes de errores
    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Creando nueva instancia
        $vendedor = new Vendedor($_POST['vendedor']);
        
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
        <h1>Registrar Vendedor(a)</h1>
        <a href="/admin/" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):  ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/vendedores/crear.php" class="formulario" method="POST">
            <?php include '../../includes/templates/formulario_vendedores.php';  ?>
            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
        </form>
    </main>


    <?php incluirTemplate('footer'); ?>