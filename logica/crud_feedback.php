<?php

/* solicitud de la clase */
require_once dirname(dirname(__FILE__)) . '/controladores/class_feedback.php';

$obj = new Feedback();
$feedbacks = $obj->get_all();
echo "<table class='bordered'><tr><th>id</th><th>user_id</th><th>title</th><th>comment</th><th>status</th><th>Opts</th>";
echo "</tr>";

if ($feedbacks) {
    foreach ($feedbacks as $feedback) {
        echo "<tr>";
        echo "<td>$feedback->id</td>";
        echo "<td>$feedback->user_id</td>";
        echo "<td>$feedback->title</td>";
        echo "<td>$feedback->comment</td>";
        echo "<td>$feedback->status</td>";
        echo "<td><a class='btn red'><i class='material-icons'>delete</i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=6 class='orange white-text'>No hay datos de la tabla en la base de datos</td></tr>";
}
echo "</table>";
?>

