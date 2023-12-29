<?php 
    // sesion abierta
    require '../includes/app.php';
    verificarAutenticacion();

    use App\Propiedad;
    use App\Vendedor;

    // implementacion de metodo para obtener todas las propiedades
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    // incluye template
    incluirTemplate('header');

    // muestra un mensaje condicional, basado en si se creo un registro
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $tipo = $_POST['tipo'];
            if(validarTipoContenido($tipo)){
                // Compara lo que se va a eliminar

                if($tipo == 'vendedor'){
                    // Obtener los datos de la propiedad
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }

                if($tipo == 'propiedad'){
                    // Obtener los datos de la propiedad
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }   
        }
    }
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php
            $mensaje = mostrarNotificacion(intval($resultado));

            if ($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo (a) Vendedor</a>

        <h2>Propiedades</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrando datos en la tabla -->
                <?php foreach($propiedades as $propiedad): ?>
                    <tr>
                        <td><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="imagen propiedad"></td>
                        <td>$<?php echo $propiedad->precio; ?></td>
                        <td>
                            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?> " class="boton-amarillo-block">Actualizar</a>
                            <form class="w-100" method="POST">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrando datos en la tabla -->
                <?php foreach($vendedores as $vendedor): ?>
                    <tr>
                        <td><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></td>
                        <td><?php echo $vendedor->telefono; ?></td>
                        <td>
                            <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?> " class="boton-amarillo-block">Actualizar</a>
                            <form class="w-100" method="POST">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php
        // Cerrando conexion a DB
        mysqli_close($db);
    ?>

    <?php incluirTemplate('footer'); ?>