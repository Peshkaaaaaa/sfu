<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php

function isHoliday($date)
{
    $holidays = [
        '01-01', '01-02', '01-03', '01-04', '01-05', '01-06', '01-07', '02-23', '03-08', '05-01', '05-09', '06-12', '11-04', '12-31'
    ];

    return in_array($date->format('m-d'), $holidays);
}

function isWeekend($date) {
    $dayOfWeek = $date->format('N');
    return ($dayOfWeek == 6 || $dayOfWeek == 7);
}

function isHighlightedDay($date) {
    return isWeekend($date) || isHoliday($date);
}

function drawCalendar($month = null, $year = null) {
    
    if ($month === null) {
      $month = date('n');
    }
    if ($year === null) {
      $year = date('Y');
    }
  
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
  
    $firstDay = date('N', strtotime("$year-$month-01"));
  
    echo "<table>";
    echo "<tr><th colspan='7'>" . date('F Y', strtotime("$year-$month-01")) . "</th></tr>";
    echo "<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th class='weekend'>Сб</th><th class='weekend'>Вс</th></tr>";
  
    echo "<tr>";
    for ($i = 1; $i < $firstDay; $i++) {
      echo "<td></td>";
    }
  
    $currentDay = 1;
    for ($i = $firstDay; $i <= 7; $i++) {
      echo "<td";
      $date = new DateTime("$year-$month-$currentDay");
      if ($currentDay == date('j') && $month == date('n') && $year == date('Y')) {
        echo " class='current-day'";
      } elseif (isHighlightedDay($date)) {
        echo " class='weekend'";
      }
      echo ">$currentDay</td>";
      $currentDay++;
    }
    echo "</tr>";
  
    while ($currentDay <= $daysInMonth) {
      echo "<tr>";
      for ($i = 1; $i <= 7 && $currentDay <= $daysInMonth; $i++) {
        echo "<td";
        $date = new DateTime("$year-$month-$currentDay");
        if ($currentDay == date('j') && $month == date('n') && $year == date('Y')) {
          echo " class='current-day'";
        } elseif (isHighlightedDay($date)) {
          echo " class='weekend'";
        }
        echo ">$currentDay</td>";
        $currentDay++;
      }
      echo "</tr>";
    }
  
    echo "</table>";
}

if (isset($_POST["sub"])) {
  $userMonth = $_POST["month"];
  $userYear = $_POST["year"];
  drawCalendar($userMonth, $userYear);
} else {
  drawCalendar();
}
?>

<br><form method="post" action="">
  <label for="month">Месяц: </label>
  <input type="number" name="month" min="1" max="12" required>

  <label for="year">Год: </label>
  <input type="number" name="year" min="1"  required>

  <input type="submit" name="sub" value="Вывести календарь">
</form>
</body>
</html>