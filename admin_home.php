<?php
    session_start();
    include "database.php";
    function countRecord($sql, $db)
    {
        $res=$db->query($sql);
        return $res->num_rows;
    }

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
                <h3 id="heading">Ласкаво просимо, адміністратор</h3>
				<div id="center">
                    <ul class="amount">
                        <li><img src="/upload/users.png" alt="users.png"> &nbsp;Усього користувачів     : <?php echo countRecord("SELECT * FROM `user`",$db); ?></li>
                        <li><img src="/upload/books.png" alt="books.png"> &nbsp;Усього книг             : <?php echo countRecord("SELECT * FROM `book`",$db); ?></li>
                        <li><img src="/upload/requests.png" alt="requests.png"> &nbsp;Усього запитів    : <?php echo countRecord("SELECT * FROM `request`",$db); ?></li>
                        <li><img src="/upload/comments.png" alt="comments.png"> &nbsp;Усього коментарів : <?php echo countRecord("SELECT * FROM `comment`",$db); ?></li>
                    </ul>
				</div>
            </div>
            <div id="inbar"> 
                <?php
                    include "admin_sidebar.php";
                ?>
            </div>
            <div id="footer">
                <p>&copy; Електронна бібліотека. 2022р.</p> 
            </div>
        </div>
    </body>
</html>