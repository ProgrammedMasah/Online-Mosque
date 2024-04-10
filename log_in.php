<?php
session_start();

if(isset($_POST["submit"])){

    $name=$_POST["name"];
    $userPassword=$_POST["password"];


    include './connect.php';
    
    $select = "SELECT * FROM users_1 WHERE `name`='$name' AND `password`='$userPassword'";

    $query = mysqli_query($conn,$select);
 
    if(mysqli_num_rows($query)>0){
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $_SESSION["id"]=$id;
        header("location:./home_page.php");
    }
    else{ ?>
        <!DOCTYPE html>
        <html lang="ar" dir="ltr">
            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=cocon-next-arabic" />
                <title>تسجيل الدخول</title>
                <link rel="stylesheet" href="./style/style_log_in.css">
            </head>
            <body>
                <div class="center">
                    <h1>اسم المستخدم أو كلمة المرور خاطئة</h1>
                    <form method="post" action="./index.html" method="post">
                        <input type="submit" name="submit" value="العودة">
                    </form>
                </div>
            </body>
        </html>
<?php        
    }
}
?>