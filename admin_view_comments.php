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
                <h3 id="heading">Переглянути коментарі</h3>
				<?php
                    $sql="SELECT book.BTITLE, user.NAME, comment.COMM, comment.LOGS 
                    FROM `comment` 
                    INNER JOIN `book` 
                    ON book.BID=comment.BID 
                    INNER JOIN user 
                    ON comment.UID=user.ID";
                    $sqlsel=
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        echo "<table>
                            <tr>
                                <th>№</th>
                                <th>Книга</th>
                                <th>Логін</th>
                                <th>Коментар</th>
                                <th>Логи</th>
                                <th>Видалити</th>
                            </tr>
                             ";
                             $id=0;
                             while ($row=$res->fetch_assoc())
                             {
                                $id++;
                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$row["BTITLE"]}</td>";
                                echo "<td>{$row["NAME"]}</td>";
                                echo "<td>{$row["COMM"]}</td>";
                                echo "<td>{$row["LOGS"]}</td>";
                                echo "<td><a href='delete_comment.php?id={$row["LOGS"]}'>Видалити</a></td>";
                                echo "</tr>";
                             }
                             echo "</table>";
                    }
                    else
                    {
                        echo "<p class='error'>Коментарів не знайдено</p>";
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