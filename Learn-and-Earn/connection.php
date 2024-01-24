<?php

    $con = new mysqli('localhost', 'root', '', 'learn&earn');

    if(!$con) {
        die(mysqli_error($con));
    }

?>