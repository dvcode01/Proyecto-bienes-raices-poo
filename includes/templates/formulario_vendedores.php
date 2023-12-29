    <fieldset>
        <legend>Información General</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" name="vendedor[nombre]" id="titulo" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre); ?>">

        <label for="apellido">Apellido:</label>
        <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido); ?>">
    </fieldset>

    <fieldset>
        <legend>Información Extra</legend>
        <label for="telefono">Telefono:</label>
        <input type="tel" name="vendedor[telefono]" id="telefono" placeholder="Ej: 2322334" value="<?php echo s($vendedor->telefono); ?>">
    </fieldset>