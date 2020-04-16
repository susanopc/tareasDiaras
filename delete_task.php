<?php

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM task WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('No se pudieron eliminar tus datos');
    }

    $_SESSION['mensaje'] = 'Tarea eliminada de manera exitosa';
    $_SESSION['color'] = 'danger';

    header('Location: index.php');

}

?>