<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_level.php';

$obj = new Level();
$levels = $obj->get_all();
echo "<table class='bordered'><tr><th>id</th><th>name</th><th>function</th><th>Opts</th>";
echo "</tr>";

if ($levels) {
    foreach ($levels as $level) {
        echo "<tr>";
        echo "<td>$level->id</td>";
        echo "<td>$level->name</td>";
        echo "<td>$level->function</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=4 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

