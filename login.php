<?php 
    // Conexion a DB
    require  'includes/app.php';
    $db = conectarDB();
    
    // Autenticar usuario
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[] = 'El email no es valido';
        }

        if(!$password){
            $errores[] = 'El password es obligatorio';
        }

        if(empty($errores)){
            // reviar si ususario existe
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);

            if($resultado->num_rows){
                // revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // verificar password
                $auth = password_verify($password, $usuario['password_user']);

                if(!$auth){
                    $errores[] = 'El password no es valido';
                }else{
                    // usuario autenticado
                    session_start();

                    // llenando el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                }

                
                
            }else{
                $errores[] = 'El usuario no existe';
            }
        }
    }
    
    // Incluye el header
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error):  ?>
            <div class="alerta error"><?php echo $error; ?></div>
        <?php endforeach;  ?>

        <form action="" class="formulario" method="POST">
            <fieldset>
                    <legend>Email y Password</legend>

                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="Tu correo:" >

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Ej: 1234" >
            </fieldset>

            <input type="submit" value="Iniciar sesión" class="boton boton-verde-block">
        </form>
    </main>


    <?php incluirTemplate('footer'); ?>