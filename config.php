<?php

$conn = new mysqli("localhost", "root", "usbw", "test");
        if($conn->connect_error){
            die("Connection Failed");
        }

?>