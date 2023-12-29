<?php
    
    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? null; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img class="logo-header" src="/build/img/logo.svg" alt="logotipo bienes raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="menu-derecha">
                    <img src="/build/img/dark-mode.svg" alt="Icono dark mode" class="btn-mode">
                    <nav class="navegacion">
                        <a href="Nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="Contacto.php">Contacto</a>
                        <?php if($auth):  ?>
                            <a href="cerrar_sesion.php">Cerrar sesión</a>
                        <?php endif;  ?>
                    </nav>
                </div>
            </div> <!-- cierre de la etiqueta barra -->

            <?php if($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
            
        </div>
    </header>