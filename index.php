
<?php

session_start();
require "functions/connect.php";
if(!isset($_SESSION['vale'])){
  header("location:login.php");
  exit();
}
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> SimpleChat
          </div>
          <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
          </div>
        </header>
      
        <main class="msger-chat">
        <?php
              $id_users = $_SESSION["vale"];

              $select_msg = $coon -> query("SELECT * FROM msg  ");

              foreach( $select_msg as $row_msg){

            
              ?>

          <div  class="msg left-msg">
            <div
             class="msg-img"
             style="background-image: url(images/<?php echo $row_msg["image"] ?>)"
            ></div>
      
            <div  style="background:<?php echo  $row_msg["color"] ?> ; " class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name"><?php  echo $row_msg["name"]  ?></div>
                <div class="msg-info-time">12:45</div>
              </div>

         
          
      
              <div class="msg-text">
    <?php  echo $row_msg["msg"]  ?><br>
 
              </div>
            </div>
            
      
          </div>
      
         <a   class="btn btn-danger m-2 p-2" href="functions/delete_msg.php?id=<?php echo $row_msg["id"];  ?>">delete msg</a>
         <br>
   
      <?php   }  ?>

  

             

      
        </main>
      
        <form class="msger-inputarea">
          <input type="text" class="msger-input" placeholder="Enter your message...">
          <button type="submit" class="msger-send-btn">Send</button>
        </form>
      </section>


      <script src="js/bootstrap.bundle.min.js" ></script>
      <script src="js/jquery-3.6.1.min.js" ></script>
      <script src="js/main.js" ></script>


      <script>
        
        $(function(){

          $(".msger-inputarea").submit(function(e){
            // e.preventDefault();
            



            
            var msg = $(".msger-input").val();
         
              if(msg !=""){

                
              $.post("functions/insert_msg.php",{

                N_MSG : msg 

                  },function(){}

                  )

              }






       
      



          
          })

        })


      </script>


</body>
</html>