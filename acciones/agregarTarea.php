<?php
    include '../db.php';
    $tarea = $_POST['tarea'] ?? null;
    if($tarea){
        $añadirTarea = "INSERT INTO tareas (tarea, completa) VALUES ('$tarea', 0)";
        $guardarTarea = mysqli_query($conn,$añadirTarea);
    }; 
    header("Location: ../index.php");
    exit();  
?>