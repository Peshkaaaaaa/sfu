<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evpatoriastyles.css">
    <title>Дополнительные услуги</title>
</head>
<body>
    <button class="but"><a href="evpatoria.php">Вернуться на главную страницу</a></button>
    <H1 class="doph1">Дополнительные услуги</H1>
    <div class="saunacontainer">
        
        <?php
            session_start();
            require_once('db.php');
        
            if (!isset($_SESSION['user_id'])) {
                header("Location: index.html");
                exit();
            }
        
            $user_id = $_SESSION['user_id'];
        
            $sql_role = "SELECT role FROM users WHERE id=$user_id";
            $result_role = $conn->query($sql_role);
            $sql_uslugi = "SELECT * FROM uslugi";
            $result_uslugi = $conn->query($sql_uslugi);
            if ($result_uslugi->num_rows > 0) {
                while ($row = $result_uslugi->fetch_assoc()) {
                    echo '<div class="sauna">';
                    echo '<img src="' . $row['photo_path'] . '" alt="' . $row['name'] . '" width="100%" height="700">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '' . $row['entertainments'] . '</p>';
                    echo '<p>Цена услуги: ' . $row['price'] . ' руб.</p>';
                    echo '</div>';
                }
            } else {
                echo 'Пока нет дополнительных услуг';
            }
            $conn->close();
            ?>
            
    </div>
    <br>
    <br>
    <div class="container">
        <div class="contacts">

            <div class="contact-block">
                <h4>Наш номер телефона</h4>
                <p>+7 (914) 805-72-23</p>
            </div>

            <div class="contact-block">
                <h4>Наша почта</h4>
                <p>evpatoria24@yandex.ru</p>
            </div>

            <div class="contact-block">
                <h4>Для вас</h4>
                <a href="dashboard.php">Перейти в профиль</a>
            </div>
        </div>
    </div>
    <br>
    
</body>
</html>