<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evpatoriastyles.css">
</head>
<body class="phone">
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

    if ($result_role->num_rows > 0) {
        $user_role = $result_role->fetch_assoc()['role'];

        if ($user_role === 'admin') {
            echo '<button><a href="admin.php">Страница администратора</a></button>';
        }
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="saunastyles.css">
    <title>Evpatoria</title>
</head>
<body>
    <div class="saunacontainer">
        <h2>Welcome, to Evpatoria!</h2>
    </div>

    <div class="container">
        <form id="phoneForm">
            <label for="phoneNumber">Введите номер телефона:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" pattern="89\d{9}" required>
            <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<button type="button" onclick="openApplication()">Добавить</button>';
                } else {
                    echo '<p>Login to add a phone number</p>';
                }
            ?>
            <p> И наш администратор свяжется с вами в течение 10 минут</p>
        </form>
    </div>  

    <div class="saunacontainer">
        <h2>Виды услуг</h3>
    </div>

    <div class="saunacontainer">
        <div class="sauna">
            <img src="xinkal.jpg" alt="">
            <h3><a href="xinkal.html">Массаж травяными мешочками</a></h3>
            <p class="text"> Экзотическая техника массажа, направленная на снятие стресса, глубокое расслабление.
            <p class="text">Цена услуги: 2300 руб. </p>
        </div>

        <div class="sauna">
            <img src="bochka.jpg" alt="">
            <h3><a href="bochka.html">Распаривание в кедровой бочке</a></h3>
            <p class="text"> Кедровая бочка — отличный метод расслабиться и подготовить тело к SPA-процедурам.
            <p class="text">Цена услуги: 2700 руб.</p>
        </div>

        <div class="sauna">
            <img src="spa.jpg" alt="">
            <h3><a href="spa.html">SPA капсула</a></h3>
            <p class="text"> Данная процедура помогает снять напряжение и стресс, улучшить самочувствие, поднять настроение.
            <p class="text">Цена услуги: 2000 руб.</p>
        </div>

        <div class="sauna">
            <img src="kamni.jpg" alt="">
            <h3><a href="kamni.html">Стоунтерапия</a></h3>
            <p class="text"> Стоунтерапия - это массаж с использованием камней, горячих и холодных.
            <p class="text">Цена услуги: 2500 руб.</p>
        </div>

    </div>

    <p class="dopbutton"><button><a href="dopuslugi.php">Дополнительные услуги</a></button></p>
        
    

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

<script>
    function openApplication() {
        var phoneNumberInput = document.getElementById('phoneNumber');
        var phoneNumber = phoneNumberInput.value;

        var phoneNumberRegex = /^89\d{9}$/;
        if (phoneNumberRegex.test(phoneNumber)) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("Your phone number has been added to the database.");
                }
            };
            xmlhttp.open("GET", "add_phone_number.php?phone=" + phoneNumber, true);
            xmlhttp.send();
        } else {
            alert("Invalid phone number format. Please enter a valid number.");
        }
    }
</script>

</body>
</html>
