<?php
session_start();
require_once('db.php');
require_once('add_uslugi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_uslugi'])) {
    $name = $_POST['name'];
    $entertainments = $_POST['entertainments'];
    $price = $_POST['price'];
    $uploadDir = 'uploads/'; 
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        $photoPath = $uploadFile;
    } else {
        $photoPath = ''; 
    }

    addUslugi($name, $entertainments, $price, $photoPath);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evpatoriastyles.css">
    <title>Страница администратора</title>
</head>
<body>
    <div class="container">
        <h2>Страница администратора</h2>

        <form action="admin.php" method="post" enctype="multipart/form-data">
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <br>
            <label for="entertainments">Описание:</label>
            <input type="text" id="entertainments" name="entertainments" required>
            <br>
            <br>
            <label for="price">Цена услуги:</label>
            <input type="number" id="price" name="price" required>
            <br>
            <br>
            <label for="photo">Фотография:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            <br>
            <br>
            <button type="submit" name="add_uslugi">Добавить услугу</button>
        </form>
        <br>
        <br>
        <button><a href="evpatoria.php">Вернуться на главную страницу</a></button>
    </div>
</body>
</html>
