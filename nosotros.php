<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, mollitia, enim nulla omnis quia amet esse ipsam minima ut et nobis sequi, fugit exercitationem error recusandae vero saepe repellendus deserunt ullam? Adipisci repudiandae nam aliquid incidunt debitis sapiente quia, minus natus quidem laboriosam ea excepturi quibusdam minima soluta temporibus eligendi officiis ullam ut.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga hic delectus similique, ipsam odio magni explicabo laborum quasi rerum rem placeat ex libero corrupti voluptatum odit! Sed atque tenetur quidem.</p>
            </div>
        </div>
    </main>

    <div class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <section class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor iusto provident aut eveniet commodi eligendi tempora quia qui pariatur quidem?</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor iusto provident aut eveniet commodi eligendi tempora quia qui pariatur quidem?</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor iusto provident aut eveniet commodi eligendi tempora quia qui pariatur quidem?</p>
            </div>
        </section>
    </div>


    <?php incluirTemplate('footer'); ?>