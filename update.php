<?php
    header("Location: index.php");
    require_once "config.php";

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $updated = mysqli_real_escape_string($conn, $_POST['updated']);

    echo $id.$updated;
    $sql = "UPDATE todo SET todo_description = '$updated' WHERE todo_id = '$id'";

    if($conn->query($sql)){
        echo "Record Updated";
    }else{
        echo mysqli_error($conn);
    }

    $conn->close();
?>