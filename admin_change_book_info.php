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
        <h3 id="heading">Редагувати книгу</h3>
        <div id="center">
        <?php
$name        = '';
$author      = '';
$year        = '';
$language    = '';
$pages       = '';
$keyword     = '';
$description = '';
if(isset($_GET["id"]))
{
    $ID=$_GET["id"];
    $sql="SELECT * FROM `book` WHERE BID=$ID";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['BTITLE'];
    $author=$row['AUTHOR'];
    $year=$row['YEAR'];
    $language=$row['LANGUAGE'];
    $pages=$row['PAGES'];
    $keyword=$row['KEYWORDS'];
    $description=$row['DESCRIPTION'];
}

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
        $sqlUpdate = "UPDATE `book` SET
                                BTITLE = '{$_POST["bname"]}',
                                AUTHOR = '{$_POST["auth"]}',
                                YEAR = '{$_POST["byear"]}',
                                LANGUAGE = '{$_POST["lang"]}',
                                PAGES = '{$_POST["page"]}',
                                KEYWORDS = '{$_POST["keys"]}',
                                DESCRIPTION = '{$_POST["descript"]}',
                                FILE = '{$target_file}',
                                BCOVER = '{$target_file1}'
                                WHERE BID = '{$_POST["book_id"]}'";
        mysqli_query($conn, $sqlUpdate);
        echo "<p class='success'>Книгу змінено</p>";
        }
        else{echo "<p class='error'>Некорректно введені дані в полях <br>Рік видання або Кількість сторінок</p>";}
    }
    else
    {
        echo "<p class='error'>Некоректно введені дані</p>";
    }
}
?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
                <label>Назва книги</label>
                <input type="text" name="bname" required value="<?php echo $name; ?>">
                <label>Автор книги</label>
                <input type="text" name="auth" required  value="<?php echo $author; ?>">
                <label>Рік видання</label>
                <input type="text" name="byear" required value="<?php echo $year; ?>">
                <label>Мова книги</label>
                <input type="text" name="lang" required value="<?php echo $language; ?>">
                <label>Кількість сторінок</label>
                <input type="text" name="page" required value="<?php echo $pages; ?>">
                <label>Ключові слова</label>
                <textarea name="keys" required><?php echo $keyword; ?></textarea>
                <label>Опис</label>
                <textarea name="descript" required><?php echo $description; ?></textarea>
                <label>Файл книги</label>
                <input type="file" name="efile" accept=".pdf" required>
                <label>Обкладинка книги</label>
                <input type="hidden" name="book_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''?>">
                <input type="file" name="efile2" accept=".jpg, .jpeg, .png" required>

                <button type="submit" name="submit">Змінити</button>
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

