<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>

<div class="container p-4">

    <div class="row">
    
        <div class="col-md-4">

            <?php if(isset($_SESSION['mensaje'])) { ?>

                <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST"><!-- formulario para guaradar las tareas -->
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Título Tarea" required autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Descripción Tarea" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="porcentaje" class="form-control" placeholder="Porcentaje Tarea" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar Tarea">
                </form>
            </div>
        </div>

        <div class="col-md-8"><!-- aca es para pintar los datos que voy a ir guardando a la BD! o sea el Listar -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Título Tarea</th>
                            <th>Descripción Tarea</th>
                            <th>Porcentaje Tarea</th>
                            <th>Creación Tarea</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query ="SELECT * FROM task";
                        $rt = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($rt)) { ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['porcentaje'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>