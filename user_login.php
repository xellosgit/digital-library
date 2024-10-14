<?php
    session_start();
    include "database.php";
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
                <div id=main>
                    <a href="index.php">
                    <img src="upload\book1.png" alt="books">
                    </a>
                </div>
                <h1>Електронна бібліотека</h1>
            </div>
            <div id="wrapper">    
                <h3 id="heading">Увійти як користувач</h3>
				<div id="center">
                <?php
                    if(isset($_POST["submit"]))
                    {
                        $sql="SELECT * FROM `user` 
                        WHERE NAME='{$_POST["name"]}' 
                        AND PASS='{$_POST["pass"]}'";
                        $res=$db->query($sql);
                        if ($res)
                        {
                        if($res->num_rows>0)
                        {
                            $row=$res->fetch_assoc();
                            $_SESSION["ID"]=$row["ID"];
                            $_SESSION["NAME"]=$row["NAME"];
                            header("location:user_home.php");
                        }
                        else
                        {
                            echo "<p class='error'>Некорректно введені дані користувача</p>";
                        }
                        }
                        else  echo "<p class='error'>Логін і пароль може включати тільки латинські букви, цифри, символи </p>";
                    }
                ?>
				<form action="user_login.php" method="post">
					<label>Логін</label>
					<input type="text" name="name" required>
					<label>Пароль</label>
					<input type="password" name="pass" required>
					<button type="submit" name="submit">Увійти</button>
				</form>
				</div>
            </div>
            <div id="inbar"> 
                <?php
                    include "sidebar.php";
                ?>
            </div>
            <div id="footer">
                <p>&copy; Електронна бібліотека. 2022р.</p> 
            </div>
        </div>
    </body>
</html>