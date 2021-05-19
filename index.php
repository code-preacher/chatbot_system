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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
   body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   }
   * {
      box-sizing: border-box;
   }
   .openChatBtn {
    /*  background-color: rgb(123, 28, 179);*/
      /*color: white;*/
      background: url(img/2.png) bottom center no-repeat;
      /*background-repeat: no-repeat;*/
      background-size: 100%;
     /* background-position: right top;*/
      padding: 26px 30px;
      border: none;
      font-weight: 500;
      font-size: 18px;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 80px;
      border-radius: 100%;
   }
   .openChat {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #ff08086b;
      z-index: 9;
   }
   form {
      max-width: 500px;
      padding: 10px;
      background-color: white;
   }
   form textarea {
      width: 100%;
      font-size: 18px;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      font-weight: 500;
      background: #d5e7ff;
      color: rgb(0, 0, 0);
      resize: none;
      min-height: 200px;
   }
   form textarea:focus {
      background-color: rgb(219, 255, 252);
      outline: none;
   }
   form .btn {
      background-color: rgb(34, 197, 107);
      color: white;
      padding: 16px 20px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
   }
   form .close {
      background-color: red;
   }
   form .btn:hover, .openChatBtn:hover {
      opacity: 1;
   }
</style>
</head>
<body>

<iframe src="https://uam.edu.ng/" width="100%" height="900" style="border:none;">
</iframe>

<button class="openChatBtn" onclick="openForm()"><!-- Chat -->&nbsp;</button>
<div class="openChat">
<form>

    <div class="wrapper">
        <div class="title">Chatbot for Uniagric Makurdi | <a href="login.php" style="color:#fff;font-size: 10px;">Admin Login</a></div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                  <!--   <i class="fas fa-user"></i> --><img src="img/s3.png">
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn" style="width: 80px;height: 40px;">Send</button>
            </div>
        </div>
    </div>


<button type="button" class="btn close" onclick="closeForm()">
Close
</button>
</form>
</div>






    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="img/s3.png"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
<script>
   document .querySelector(".openChatBtn") .addEventListener("click", openForm);
   document.querySelector(".close").addEventListener("click", closeForm);
   function openForm() {
      document.querySelector(".openChat").style.display = "block";
   }
   function closeForm() {
      document.querySelector(".openChat").style.display = "none";
   }
</script>
</body>
</html>