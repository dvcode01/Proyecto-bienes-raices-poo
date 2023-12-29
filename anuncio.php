<?php 
    require 'includes/app.php';
    use App\Propiedad;
    
    // Valor que viene de la URL
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }

    $propiedad = Propiedad::find($id);

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo;  ?></h1>

        <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio imagen" loading="lazy">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad->precio;  ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy" class="icono-anuncio">
                    <p><?php echo $propiedad->wc;  ?></p>
                </li>

                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy" class="icono-anuncio">
                    <p><?php echo $propiedad->estacionamiento;  ?></p>
                </li>

                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy" class="icono-anuncio">
                    <p><?php echo $propiedad->habitaciones;  ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad->descripcion;  ?></p>
        </div>
    </main>


    <?php incluirTemplate('footer'); ?>