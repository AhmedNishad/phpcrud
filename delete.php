<?php
header("Location: index.php");
    require_once "config.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM todo WHERE todo_id=$id";

    if($conn->query($sql)){
        echo "Successfully Deleted";
    }else{
        echo mysqli_error($conn);
    }
?>