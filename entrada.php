<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpeg">
            <img src="build/img/blog2.jpg" alt="Imagen de la propiedad" loading="lazy">
        </picture>

        <p class="informacion-neta">Escrito el: <span>10/09/2023</span> por: <span>Admin</span></p>
    
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, mollitia, enim nulla omnis quia amet esse ipsam minima ut et nobis sequi, fugit exercitationem error recusandae vero saepe repellendus deserunt ullam? Adipisci repudiandae nam aliquid incidunt debitis sapiente quia, minus natus quidem laboriosam ea excepturi quibusdam minima soluta temporibus eligendi officiis ullam ut.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga hic delectus similique, ipsam odio magni explicabo laborum quasi rerum rem placeat ex libero corrupti voluptatum odit! Sed atque tenetur quidem. minus natus quidem laboriosam ea excepturi quibusdam minima soluta temporibus eligendi officiis ullam ut.</p>
        </div>
    </main>


    <?php incluirTemplate('footer'); ?>