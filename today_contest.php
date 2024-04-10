<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=cocon-next-arabic" />
    <title>مسابقة اليوم</title>
    <link rel="stylesheet" type="text/css" href="./style/style_contest.css">
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
    <main class="table" id="customers_table">
        <section class="table__body">
            <table>
                <thead>
                    <tr>                        
                        <th> ميدالية </th>
                        <th> عدد النقط </th>
                        <th> الاسم </th>
                        <th> صورة </th>
                        <th> الترتيب </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        include './connect.php';
                        $select = "SELECT * FROM users_1 ORDER BY `today_points` DESC";

                        $query = mysqli_query($conn,$select);
                        $counter = 0;
                        $first = -1;
                        $second = -1;
                        $third = -1;

                        while($row = mysqli_fetch_array($query)){
                            if($counter==0) {$first=$row["today_points"]; $counter++;}
                            else if($counter==1 and $row["today_points"] < $first) {$second=$row["today_points"]; $counter++;}
                            else if($counter==2 and $row["today_points"] < $second) {$third=$row["today_points"]; $counter++;}
                            else $counter++;
                            echo "<tr>";
                            if($row["today_points"]==$first and $row["today_points"]!=0 ){echo "<td> <img src='./Media/ميدالية -01.png'></td>";}
                            else if($row["today_points"]==$second and $row["today_points"]!=0){echo "<td> <img src='./Media/ميدالية -02.png'></td>";}
                            else if($row["today_points"]==$third and $row["today_points"]!=0){echo "<td> <img src='./Media/ميدالية -03.png'></td>";}
                            else{echo "<td></td>";}
                            echo "<td>".$row["today_points"]." </td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td> <img src=".$row["img"]."></td>";
                            echo "<td>".$counter."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>