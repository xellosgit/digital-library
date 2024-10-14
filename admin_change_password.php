<?php
    session_start();
    include "database.php";
    if(!isset($_SESSION["AID"]))
    {
        header("location:admin_login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Digital library</title>
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="icon" type="image/x-icon" href="/upload/favicon.ico">
    </head>
    <body>
        <div id="container">
            <div id="header">
                <img src="upload\book1.png" alt="books">
                <h1>Електронна бібліотека</h1>
            </div>
            <div id="wrapper">
                <h3 id="heading">Змінити пароль</h3>
				<div id="center">
                <?php
                    if(isset($_POST["submit"]))
                    {
                        $sql="SELECT * FROM `admin` 
                        WHERE APASS='{$_POST["opass"]}' 
                        AND AID='{$_SESSION["AID"]}'";
                        $res=$db->query($sql);
                        if($res->num_rows>0)
                        {
                            $s="UPDATE `admin` SET 
                            APASS='{$_POST["npass"]}' 
                            WHERE AID=".$_SESSION["AID"];
                            $db->query($s);
                            echo "<p class='success'>Пароль змінено успішно</p>";
                        }
                        else
                        {
                            echo "<p class='error'>Некоректно введені дані</p>";
                        }
                    }
                ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label>Старий пароль</label>
                        <input type="password" name="opass" required>
                        <label>Новий пароль</label>
                        <input type="password" name="npass" required>
                        <button type="submit" name="submit">Оновити пароль</button>
                    </form>
                </div>
            </div>
            <div id="inbar"> 
                <?php
                    include "admin_sidebar.php";
                ?>
            </div>
            <div id="footer">
                <p>Copyright &copy; Віктор Печорських. 2022. Усі права захищені. </p>
            </div>
        </div>
    </body>
</html>