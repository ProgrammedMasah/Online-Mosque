<?php
    session_start();
    include './connect.php';
    $select = "SELECT `state` FROM users_1 WHERE `id`= $_SESSION[id]";
    $query = mysqli_query($conn,$select);
    $row = $query->fetch_assoc();
    $state = $row['state'];
    if($state==1){   
    ?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style_challenge.css">
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
                <a class="active" href="./home_page_2.php">الصفحة الرئيسية</a>
                <a href="./contest_2.php">منافسة الشهر</a>
                <a href="./challenge_2.php">تحدي اليوم</a>
                <a href="./today_contest_2.php">منافسة اليوم </a>
            </nav>
        </header>
        <div class="center">
            <h1> تحدي اليوم </h1>
                <form method="post" action="./collect_points_2.php" method="post">
                    <h3 claas="desc">قراءة سورة الإخلاص 🤍</h3>
                    <div class="radio-buttons">
                        <label class="radio-button">
                            <input type="radio" name="option" value="option1" required>
                            <div class="radio-circle"></div>
                            <label class="radio-label">30 مرة => 10 ختم</label>
                        </label>
                        <label class="radio-button">
                            <input type="radio" name="option" value="option2" required>
                            <div class="radio-circle"></div>
                            <label class="radio-label">60 مرة => 20 ختمة</label>
                        </label>
                            <label class="radio-button">
                            <input type="radio" name="option" value="option3" required>
                            <div class="radio-circle"></div>
                            <label class="radio-label">99 مرة => 33 ختمة</label>
                        </label>
                    <input type="submit" value="تأكيد">
                </form>
            </div>
        </body>
    </body>
</html>
<?php
}
else{
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
                <a class="active" href="./home_page_2.php">الصفحة الرئيسية</a>
                <a href="./contest_2.php">منافسة الشهر</a>
                <a href="./challenge_2.php">تحدي اليوم</a>
                <a href="./today_contest_2.php">منافسة اليوم </a>
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
?>