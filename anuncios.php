<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Anuncios</h1>

        <section class="seccion contenedor">
            <h2>Casas y Depas en Ventas</h2>
            
            <?php 
                $limite = 10;
                include 'includes/templates/anuncios.php' 
            ?>
    </main>


    <?php incluirTemplate('footer'); ?>