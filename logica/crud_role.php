<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_role.php';

$obj = new Role();
$datas = $obj->get_all();
echo "<table class='bordered'><tr>"
 . "<th>id</th>"
 . "<th>role</th>"
 . "<th>last modified</th>"
 . "<th>Opts</th>";
echo "</tr>";

if ($datas) {
    foreach ($datas as $data) {
        echo "<tr>";
        echo "<td>$data->id</td>";
        echo "<td>$data->role</td>";
        echo "<td>$data->lastmodified</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=6 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

