<?php  

// conexion a DB
require 'includes/app.php';
$db = conectarDB();

// Creando user y password
$email = 'correo@correo.com';
$password = '123456';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password_user) VALUES ('{$email}', '{$passwordHash}')";
echo $query;

// Agregando a la base de datos
mysqli_query($db, $query);