<?php
    header("Location: index.php");
    require_once "config.php";

    $todo = mysqli_real_escape_string($conn,$_POST['todo'] );
    $date = mysqli_real_escape_string($conn,$_POST['date'] );

    $sql = "INSERT INTO todo(todo_description, date_added) values ('$todo', '$date')";

    if($conn->query($sql)){
        echo "Record Added";
    }else{
        echo "Error adding record". mysqli_error($conn);
    }

    


?>