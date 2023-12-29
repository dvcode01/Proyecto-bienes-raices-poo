<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\ActiveRecord;

// Conectando a DB
$db = conectarDB();
ActiveRecord::setDB($db);


