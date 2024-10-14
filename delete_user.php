<?php
    session_start();
    include "database.php";
    if(!isset($_SESSION["AID"]))
    {
        header("location:admin_login.php");
    }
?>
<?php


if(isset($_GET["id"]))
{
    $ID = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "DELETE FROM `user` WHERE ID = '$ID'";
    if(mysqli_query($conn, $sql)){
         
        header("location:admin_view_users.php");
    } else{
        echo "Error: " . mysqli_error($conn);
    }
    $sql = "DELETE FROM `comment` WHERE UID = '$ID'";
    if(mysqli_query($conn, $sql)){
         
        header("location:admin_view_users.php");
    } else{
        echo "Error: " . mysqli_error($conn);
    }
    $sql = "DELETE FROM `request` WHERE ID = '$ID'";
    if(mysqli_query($conn, $sql)){
         
        header("location:admin_view_users.php");
    } else{
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>