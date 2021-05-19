<?php
include_once "library/lib.php";
include_once "classes/crud.php";

$crud=new Crud;
$lib=new Lib;
$lib->check_login2();

if (isset($_POST['submit'])) {
 $crud->insertChat($_POST);
}

if(isset($_GET['id'])){
$crud->delete($_GET['id'],'bot','add.php');
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
    <script src="js/second.js"></script><!-- 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
</head>
<body>
    <br/>
    <center><?=$lib->msg()?>
    <div class="wrapper">
        <div class="title">Chatbot for Uniagric Makurdi | <a href="logout.php" style="color:#fff;font-size: 10px;">Logout</a></div>
        <div class="form">
            <form action="add.php" method="post"> 
            <span>Please enter Question :</span><br>
            <textarea name="question" rows="6" cols="40"></textarea><br><br>
            <span>Please enter Reply :</span><br>
            <textarea name="reply" rows="6" cols="40"></textarea><br><br>
            <button type="submit" name="submit" class="btn1">Add to Bot</button>
            <button type="reset" class="btn2">Clear</button>

            </form>

        </div>
     
    </div>
    </center>

    <br/><br/><br/><br/><br/><br/>

    <table border="1" cellpadding="5" cellspacing="1" align="center" width="60%">
        <caption>All Chatbot Questions and Replies</caption>
        <tr>
            <td>S/N</td>
            <td>Question</td>
            <td>Reply</td>
            <td>Date Created</td>
            <td>Delete</td>
        </tr>

    <?php
    $qt=$crud->displayAllWithOrder('bot','id','desc');
    $c=1;
    if ($qt) {

     foreach($qt as $dy){
         ?>
                  <tr>
                    <td><?php echo $c++; ?></td>
                    <td><?php echo $dy['question']; ?></td>
                     <td><?php echo $dy['reply']; ?></td>
                    <td><?php echo $dy['date']; ?> </td>
                    <td><a href="add.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i>Delete</a></td>
                  </tr>

                  <?php
    }
                    
    } else {
    echo "<tr><td colspan='5'><center>No Chatbot Questions and Replies at the moment</center</td></tr>";
    }
    ?>

    </table>

    
</body>
</html>