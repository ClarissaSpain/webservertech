<?php
include("includes/db_connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $myusername = mysqli_real_escape_string($db,$_POST['username']);
   $mypassword = mysqli_real_escape_string($db,$_POST['password']);

   $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];

   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row

   if($count == 1) {
      session_register("myusername");
      $_SESSION['login_user'] = $myusername;

      header("location: welcome.php");
   }else {
      $error = "Your Login Name or Password is invalid";
   }
}
?>
<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      <link rel="stylesheet" href="../mystyle.css">

   </head>

   <body bgcolor = "#FFFFFF">
<div class="parent">
  <div class="div1">
    <img src="img/griz.jpg" alt="Griz Esports Logo" width="500">
  </div>
      <div class="div2">
        <h2> Login </h2>

               <form action = "" method = "post">
                  <input placeholder="username" type = "text" name = "username"/><br /><br />
                  <input placeholder= "password" type = "password" name = "password"  /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

            </div>

         </div>

      </div>
</div>
   </body>
</html>
