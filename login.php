<?php
include_once "library/lib.php";
include_once "classes/crud.php";

$crud=new Crud;
$lib=new Lib;

if (isset($_POST['submit'])) {
 $crud->authCheck($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot for Uniagric Makurdi</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/first.js"></script>
    <script src="js/second.js"></script>
    <!-- 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    -->
</head>
<body>
    <br/>
    <center>
    <div class="wrapper">
        <div class="title">Chatbot for Uniagric Makurdi | <a href="index.php" style="color:#fff;font-size: 10px;">Back to Home</a></div>
        <?=$lib->msg()?>
        <div class="form">
            <form action="login.php" method="post"> 
            <span>Username :</span><br>
            <input type="text" name="name" class="box"><br><br>
            <span>Password :</span><br>
            <input type="password" name="password" class="box"><br><br>
            <button type="submit" name="submit" class="btn3">Login</button>

            </form>

        </div>
     
    </div>
    </center>

    
</body>
</html>