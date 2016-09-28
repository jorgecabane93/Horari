<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_center.php';

$obj = new Center();
$centers = $obj->get_all();
echo "<table class='bordered'><tr><th>id</th><th>company_id</th><th>name</th><th>acronym</th><th>last modified</th><th>Opts</th>";
echo "</tr>";

if ($centers) {
    foreach ($centers as $center) {
        echo "<tr>";
        echo "<td>$center->id</td>";
        echo "<td>$center->company_id</td>";
        echo "<td>$center->name</td>";
        echo "<td>$center->acronym</td>";
        echo "<td>$center->lastmodified</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=6 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

