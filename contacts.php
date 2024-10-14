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
                <h3 id="heading">Контакти</h3>
                    <div id="contacts">  
                        <p><a href="https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%A1%D1%82%D1%80%D0%B5%D0%BB%D0%B5%D1%86%D0%BA%D0%B0%D1%8F,+4,+%D0%9A%D0%B8%D0%B5%D0%B2,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0,+02000/@50.454683,30.5112374,17z/data=!3m1!4b1!4m5!3m4!1s0x40d4ce5c9922ec15:0xf96738b46d2c7d3c!8m2!3d50.4546796!4d30.5134261" target="_blank"><img src="/upload/location.png" alt="location.png"> &nbsp;Вулиця Стрілецька, 4, Київ, 02000</a></p>
                        <p><a href="tel:0 800 000 000"><img src="/upload/phone.png" alt="phone.png"> &nbsp;0 800 000 000</a></p>
                        <p><a href="mailto:admin@gmail.com"><img src="/upload/mail.png" alt="mail.png"> &nbsp;admin@gmail.com</a></p>
                        <p> &nbsp;Розробник: Печорських В.М.</p>
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