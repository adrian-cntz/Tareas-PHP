<?php 
    include './db.php';
    $listaTareas = "SELECT * FROM tareas";
    $arrayTareas = mysqli_query($conn, $listaTareas);
?>    