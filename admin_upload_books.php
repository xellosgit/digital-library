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
                <h3 id="heading">Додати книгу</h3>
				<div id="center">
                <?php
                    if(isset($_POST["submit"]))
                    {
                       $target_dir="upload/";
                       $target_file=$target_dir.basename($_FILES["efile"]["name"]);
                       $target_file1=$target_dir.basename($_FILES["efile2"]["name"]);
                       if(move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file))
                       {
                            $check_year=$_POST['byear'];
                            $check_page=$_POST['page'];
                            if(ctype_digit($check_year) && ctype_digit($check_page))
                            {
                            $sql="insert into book(BTITLE,AUTHOR,YEAR,LANGUAGE,PAGES,KEYWORDS,DESCRIPTION,FILE, BCOVER, AID) 
                            values ('{$_POST["bname"]}',
                                    '{$_POST["auth"]}',
                                    '{$_POST["byear"]}',
                                    '{$_POST["lang"]}',
                                    '{$_POST["page"]}',
                                    '{$_POST["keys"]}',
                                    '{$_POST["descript"]}',
                                    '{$target_file}',
                                    '{$target_file1}', 
                                    {$_SESSION["AID"]})";
                            $db->query($sql);
                            echo "<p class='success'>Книгу додано успішно</p>";
                            }
                            else
                            {
                                echo "<p class='error'>Некорректно введені дані в полях <br>Рік видання або Кількість сторінок</p>";
                            }
                       }
                       else
                       {
                            echo "<p class='error'>Некорректно введені дані</p>";
                       }
                    }
                ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
                        <label>Назва книги</label>
                        <input type="text" name="bname" required>
                        <label>Автор книги</label>
                        <input type="text" name="auth" required>
                        <label>Рік видання</label>
                        <input type="text" name="byear" required>
                        <label>Мова книги</label>
                        <input type="text" name="lang" required>
                        <label>Кількість сторінок</label>
                        <input type="text" name="page" required>
                        <label>Ключові слова</label>
                        <textarea name="keys" required></textarea>
                        <label>Опис</label>
                        <textarea name="descript" required></textarea>
                        <label>Файл книги</label>
                        <input type="file" name="efile" accept=".pdf" required>
                        <label>Обкладинка книги</label>
                        <input type="file" name="efile2" accept=".jpg, .jpeg, .png" required>
                        <button type="submit" name="submit">Додати</button>
                    </form>
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