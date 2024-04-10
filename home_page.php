<?php
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style_home_page.css">
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=cocon-next-arabic" />
        <title>الصفحة الرئيسية</title>
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
        <section class="main">
            <video autoplay loop muted>
                <source src="./Media/Media1.mp4" type="video/mp4">
            </video>
        </section>
        <section id="top">
            <h2 class="title">💪 أبطال التحدي</h2>
            <div class="content">
                <?php
                include './connect.php';
                $select = "SELECT * FROM users_1 ORDER BY `points` DESC";

                $query = mysqli_query($conn,$select);
                $counter = 1;
                $first = -1;
                $second = -1;
                $third = -1;

                while($row = mysqli_fetch_array($query)){
                    if($counter==1) {$first=$row["points"]; $counter++;}
                    else if($counter==2 and $row["points"] < $first) {$second=$row["points"]; $counter++;}
                    else if($counter==3 and $row["points"] < $second) {$third=$row["points"]; $counter++;}

                    if($row["points"]==$first){
                        echo"<div class='card' id='_1'>";
                        echo    "<div class='photo'>";
                        echo        "<img src=".$row["gold_medal"].">";
                        echo    "</div>";
                        echo    "<div class='name'>";
                        echo        "<h3>".$row["name"]."</h3>";
                        echo    "</div>";
                        echo"</div>";
                    }
                    else if($row["points"]==$second){
                        echo"<div class='card' id='_2'>";
                        echo    "<div class='photo'>";
                        echo        "<img src=".$row["silver_medal"].">";
                        echo    "</div>";
                        echo    "<div class='name'>";
                        echo        "<h3>".$row["name"]."</h3>";
                        echo    "</div>";
                        echo"</div>";
                    }
                    else if($row["points"]==$third){
                        echo"<div class='card' id='_3'>";
                        echo    "<div class='photo'>";
                        echo        "<img src=".$row["bronze_medal"].">";
                        echo    "</div>";
                        echo    "<div class='name'>";
                        echo        "<h3>".$row["name"]."</h3>";
                        echo    "</div>";
                        echo"</div>";
                    }
                    else break;
                }
                ?>
            </div>
        </section>
    </body>
</html>