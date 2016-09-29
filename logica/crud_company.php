<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_company.php';

$obj = new Company();
$companys = $obj->get_all();
echo "<table class='bordered'><tr>"
 . "<th>id</th>"
 . "<th>name</th>"
 . "<th>dni</th>"
 . "<th>commercialbusiness</th>"
 . "<th>address</th>"
 . "<th>extralocation</th>"
 . "<th>extra</th>"
 . "<th>last modified</th>"
 . "<th>Opts</th>";
echo "</tr>";

if ($companys) {
    //print_r($companys);
    foreach ($companys as $company) {
        echo "<tr>";
        echo "<td>$company->id</td>";
        echo "<td>$company->name</td>";
        echo "<td>$company->dni</td>";
        echo "<td>$company->commercialbusiness</td>";
        echo "<td>$company->adress</td>";
        echo "<td>$company->extralocation</td>";
        echo "<td>$company->extra</td>";
        echo "<td>$company->lastmodified</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=9 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

