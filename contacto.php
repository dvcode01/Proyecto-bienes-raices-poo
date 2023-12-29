<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="imagen de contacto" loading="lazy">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre:">

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="Tu correo:">

                <label for="telefono">Telefono:</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Ej: 2434344">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" placeholder="Tu precio o presupuesto">
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" value="email" id="contactar-email">
                </div>

                <p>Si eligio teléfono, elija la hora y fecha para ser contactado</p>

                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha">

                <label for="hora">hora:</label>
                <input type="time" name="hora" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>


    <?php incluirTemplate('footer'); ?>