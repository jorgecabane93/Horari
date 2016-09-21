<?php

/**
 * Archivo de conexión de la clase BD.
 */
 
require_once '../class_bd.php';

$connection = new BD();
$connection->connect();
