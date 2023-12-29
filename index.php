<?php 
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Ventas</h2>
        
        <?php 
            $limite = 3;
            include 'includes/templates/anuncios.php' 
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo en brevedad.</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="texto entrada blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Entrada en el techo de tu casa</h4>
                        <p class="informacion-neta">Escrito el: <span>10/09/2023</span> por: <span>Daniel Villalobo</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article> <!-- entrada 1 de blog -->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="texto entrada blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-neta">Escrito el: <span>10/09/2023</span> por: <span>Daniel Villalobo</span></p>

                        <p>
                            Maximiza el espacio en tu hogar con estta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article> <!-- entrada 2 de blog -->
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de manera excelente, muy buena atención y la casa que me ofrecieron cumplieron con mis expectativas.
                </blockquote>
                <p>- Miguel Torres.</p>
            </div>
        </section>
    </div>

<?php incluirTemplate('footer'); ?>