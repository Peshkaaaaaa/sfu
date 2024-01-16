<?php

function addUslugi($name, $entertainments, $price, $photoPath) {
    global $conn;

    $name = mysqli_real_escape_string($conn, $name);
    $entertainments = mysqli_real_escape_string($conn, $entertainments);

    $sql = "INSERT INTO uslugi (name, entertainments, price, photo_path) 
            VALUES ('$name', '$entertainments', $price, '$photoPath')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        if (file_exists("dopuslugi.php")) {
            header("Location: dopuslugi.php");
            exit();
        } else {
            echo "Error: dopuslugi.php not found!";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
