<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_resource.php';

$obj = new Resource();
$resources = $obj->get_all();
echo "<table class='bordered'><tr><th>id</th><th>color</th><th>name</th><th>extra</th><th>lastmodified</th><th>Opts</th>";
echo "</tr>";

if ($resources) {
    foreach ($resources as $resource) {
        echo "<tr>";
        echo "<td>$resource->id</td>";
        echo "<td>$resource->color</td>";
        echo "<td>$resource->name</td>";
        echo "<td>$resource->extra</td>";
        echo "<td>$resource->lastmodified</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=6 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

