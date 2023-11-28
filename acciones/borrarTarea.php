<?php 
    include '../db.php';
    $id_borrar = $_POST['id'];
    $bTarea = "DELETE FROM tareas WHERE id_tarea = $id_borrar";
    $borrarTarea = mysqli_query($conn, $bTarea);
    header("Location: ../index.php");
    exit();
?>