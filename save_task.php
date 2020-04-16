<?php 
include("db.php");

if(isset($_POST['save_task'])) {
    $t = $_POST['title'];
    $d = $_POST['description'];
    $p = $_POST['porcentaje'];

    $query = "INSERT INTO task (title, description, porcentaje) VALUES ('$t', '$d', '$p')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('No se pudieron guardar los datos');
    }

    $_SESSION['mensaje'] = 'Tarea guardada de manera exitosa';
    $_SESSION['color'] = 'success';

    header('Location: index.php');


}

?>