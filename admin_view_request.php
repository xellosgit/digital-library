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
                <h3 id="heading">Наявні запити користувачів</h3>
				<?php
                    $sql="SELECT user.NAME, request.MESSAGE, request.LOGS 
                    FROM `user` 
                    INNER JOIN request 
                    ON user.ID=request.ID";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        echo "<table>
                            <tr>
                                <th>№</th>
                                <th>Логін</th>
                                <th>Повідомлення</th>
                                <th>Логи</th>
                            </tr>
                             ";
                             $i=0;
                             while ($row=$res->fetch_assoc())
                             {
                                $i++;
                                echo "<tr>";
                                echo "<td>{$i}</td>";
                                echo "<td>{$row["NAME"]}</td>";
                                echo "<td>{$row["MESSAGE"]}</td>";
                                echo "<td>{$row["LOGS"]}</td>";
                                echo "</tr>";
                             }
                             echo "</table>";
                    }
                    else
                    {
                        echo "<p class='error'>Записів запитів не знайдено</p>";
                    }
                ?>
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