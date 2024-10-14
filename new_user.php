<?php

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
                <h3 id="heading">Зареєструватись як новий користувач</h3>
				<div id="center">
                <?php
                    if(isset($_POST["submit"]))
                    {    
                        $user=$_POST['name'];
                        $sql = "SELECT * FROM `user` WHERE NAME='$user'";
                        $res=$db->query($sql);
                        if($res->num_rows>0)
                        {
                            echo "<p class='error'>Користувач з таким логіном вже існує</p>";
                        }
                        else
                        {
                            $ncheck=$_POST['name']; //перевірка логіну 
                            $pcheck=$_POST['pass']; //перевірка паролю 
                            if(stristr($ncheck," ") || stristr($pcheck," ")) //перевірка логіну і паролю на наявність символа пробілу 
                            {
                                echo "<p class='error'>Пробіл не допустимий</p>";
                            }
                            else
                            {
                                $sql="insert into user(NAME,PASS,EMAIL,STATUS) values ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["email"]}','{$_POST["status"]}')";
                                $db->query($sql);
                                echo "<p class='success'>Успішна реєстрація користувача</p>";
                            }
                        }
                     }
                    
                ?>

                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label>Логін</label>
                        <input type="text" name="name" required>
                        <label>Пароль</label>
                        <input type="password" name="pass"  required>
                        <label>Email</label>
                        <input type="email" name="email" required>
                        <select name="status" required>
                            <option value="">Виберіть ваш статус</option>
                            <option value="Студент">Студент</option>
                            <option value="Викладач">Викладач</option>
                            <option value="Інший працівник">Інший працівник</option>
                        </select>
                        <button type="submit" name="submit">Зареєструватися</button>
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



                    <!--
                    if(isset($_POST["submit"]))
                    {

                            $sql="insert into user(NAME,PASS,EMAIL,STATUS) values ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["email"]}','{$_POST["status"]}')";
                            $db->query($sql);
                            echo "<p class='success'>Успішна реєстрація користувача</p>";

                    }
                    -->