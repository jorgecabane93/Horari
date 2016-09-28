<?php

/**
 * Archivo de definicion de la clase BD.
 */

$BD = new mysqli('localhost', 'root', '', 'horari');

if ($BD->connect_error) {
    die("Connection failed: " . $BD->connect_error);
} 