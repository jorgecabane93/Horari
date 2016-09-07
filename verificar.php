<?php

include 'class_bd.php';

//$connection = new BD('localhost', 'root', '', 'horari');
$connection = new BD();
$connection->connect();

$query = 'SELECT * FROM  user';
$result = mysqli_query($connection->myconn, $query);


if($numrows = mysqli_num_rows($result)) {
        echo $numrows;
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $secondname = $row['secondname'];
        $lastname = $row['lastname'];
        $secondlastname = $row['secondlastname'];
        echo $name. " ";
        echo $secondname. " ";
        echo $lastname. " ";
        echo $secondlastname. " ";
    }}
?>