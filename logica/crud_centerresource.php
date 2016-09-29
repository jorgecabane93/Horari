<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_centerresource.php';

$obj = new Center_resource();
$datas = $obj->get_all();
echo "<table class='bordered'><tr>"
 . "<th>center id</th>"
 . "<th>resource id</th>"
 . "<th>last modified</th>"
 . "<th>Opts</th>";
echo "</tr>";

if ($datas) {
    foreach ($datas as $company) {
        echo "<tr>";
        echo "<td>$data->centerid</td>";
        echo "<td>$data->resourceid</td>";
        echo "<td>$data->lastmodified</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=6 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

