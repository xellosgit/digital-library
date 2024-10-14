<?php
    session_start();
    include "database.php";
    if(!isset($_SESSION["ID"]))
    {
        header("location:user_login.php");
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
                <h3 id="heading">Запит адміністратору</h3>
				<div id="center">
                <?php
                    if(isset($_POST["submit"]))
                    {
                        $sql="INSERT INTO request (ID,MESSAGE,LOGS) 
                        VALUES ({$_SESSION["ID"]},
                        '{$_POST["message"]}', 
                        NOW());";
                        $res=$db->query($sql);
                       
                            echo "<p class='success'>Запит надіслано адміністратору</p>";
                    }
                ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label>Повідомлення</label>
                        <textarea required name="message" ></textarea>
                        <button type="submit" name="submit">Надіслати</button>
                    </form>
                </div>
            </div>
            <div id="inbar"> 
                <?php
                    include "user_sidebar.php";
                ?>
            </div>
            <div id="footer">
                <p>&copy; Електронна бібліотека. 2022р.</p> 
            </div>
        </div>
    </body>
</html>