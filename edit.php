<?php

    include('db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM task WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $ti = $row['title'];
            $de = $row['description'];
            $po = $row['porcentaje'];

        }

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $tit = $_POST['title'];
        $des = $_POST['description'];
        $p = $row['porcentaje'];

        $query = "UPDATE task SET title = '$tit', description = '$des', porcentaje = '$p' WHERE id = '$id'";
        mysqli_query($conn, $query);

        /* $result = mysqli_query($conn, $query);  //esto aca es si necesitaria hacer algo con esos datos
        if (!$result) {
                die('El query de actualkizacion fallo!');
        } */

        $_SESSION['mensaje'] = 'Tarea actualizada de manera exitosa';
        $_SESSION['color'] = 'warning';

        header('Location: index.php');

    }
}

?>

<?php include('includes/header.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="title" value="<?php echo $ti; ?>" class="form-control" placeholder="Actualiza tu título">
                </div>
                <div class="form-group">
                    <textarea name="description" rows="2" class="form-control" placeholder="Actualiza tu descripción"><?php echo $de; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="porcentaje" value="<?php echo $po; ?>" class="form-control" placeholder="Actualiza tu porcentaje">
                </div>
                <button class="btn btn-success btn-block" name="actualizar">
                    Actualizr Tareas
                </button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>