<?php
session_start();
$points_;
$option_ = $_POST['option'];

if($option_ == "option1")  {$points_ = 5;}
else if($option_ == "option2")  {$points_ = 10;}
else if($option_ == "option3")  {$points_ = 15;}

include './connect.php';

$query_1 = "UPDATE users_1
        SET `state` = 0
        WHERE `id` =  $_SESSION[id]";
mysqli_query($conn, $query_1);
$query_2 = "UPDATE users_1
        SET `today_points` = `today_points`+ $points_
        WHERE `id` =  $_SESSION[id]";
mysqli_query($conn, $query_2);
$query = "UPDATE users_1
        SET `points` = `points`+ $points_
        WHERE `id` =  $_SESSION[id]";
if (mysqli_query($conn, $query)) {
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style_done.css">
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=cocon-next-arabic" />
        <title>تحدي اليوم</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header class="header">
            <a href="#" class="logo">قُـطـوفٌ إِيـمـانـيَّـة</a>
            <input type="checkbox" id="check">
            <label for="check" class="icons">
                <i class='bx bx-menu' id="menu-icon"></i>
                <i class='bx bx-x' id="close-icon"></i>
            </label>
            <nav class="navbar">
                <a class="active" href="./home_page.php">الصفحة الرئيسية</a>
                <a href="./contest.php">منافسة الشهر</a>
                <a href="./challenge.php">تحدي اليوم</a>
                <a href="./today_contest.php">منافسة اليوم </a>
            </nav>
        </header>
        <div class="center">
                    <h1> 💪 تمت المهمة لليوم </h1>
                </div>
        </body>
    </body>
</html>
<?php
} 
else {
    echo "Error updating user field: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
