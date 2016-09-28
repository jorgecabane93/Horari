<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_center.php';

$centers = new Center();

echo "<table class='bordered'><tr><th>id</th><th>company_id</th><th>name</th><th>acronym</th><th>last modified</th><th>Opts</th>";
echo "</tr>";
foreach ($centers->get_all()as $center) {
    echo "<tr>";
    echo "<td>$center->id</td>";
    echo "<td>$center->company_id</td>";
    echo "<td>$center->name</td>";
    echo "<td>$center->acronym</td>";
    echo "<td>$center->lastmodified</td>";
    echo "<td><a class='btn red'><i class='large material-icons'>delete</i></a></td>";
    echo "</tr>";
}
echo "</table>";
?>

