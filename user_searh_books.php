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
                <h3 id="heading">Пошук книги</h3>
				<div id="center">

                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label>Введіть назву книги або її ключові слова</label>
                        <input type="text" required name="name">
                        <button type="submit" name="submit">Шукати</button>
                    </form>
                </div>
                <?php
                if(isset($_POST["submit"]))
                {
                    $sql="SELECT * FROM `book` 
                    WHERE BTITLE 
                    LIKE '%{$_POST["name"]}%' 
                    OR KEYWORDS 
                    LIKE '%{$_POST["name"]}%'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        echo "<table>
                            <tr>
                            <th>№</th>
                            <th width='80px'>Обкладинка</th>
                            <th width='90px'>Назва книги</th>
                            <th>Ключові слова</th>
                            <th width='70px'>Детально</th>
                            </tr>
                             ";
                             $id=0;
                             while ($row=$res->fetch_assoc())
                             {
                                $id++;
                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td><img src= '{$row["BCOVER"]}' alt='cover' width='100%'> </td>";
                                echo "<td>{$row["BTITLE"]} </td>";
                                echo "<td>{$row["KEYWORDS"]}</td>";
                                echo "<td><a href='user_view_book_info.php?id={$row["BID"]}'>Відкрити</a></td>";
                                echo "</tr>";
                             }
                             echo "</table>";
                    }
                    else
                    {
                        echo "<p class='error'>Записів книг не знайдено</p>";
                    }
                }
                ?>
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