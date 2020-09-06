
  <?php

  include_once '../includes/config.php';
  // session_start();

if (isset($_POST["firstName"])){
    $firstName =$_POST["firstName"];
}
else{
  echo "its fucked";
}
if (isset($_POST["lastName"])){
      $lastName =$_POST["lastName"];
}
else{
  echo "its fucked";
}


      echo "we are in the money";
      echo "First name: $firstName";
     echo "Last name: $lastName";




     // $link=mysqli_connect("localhost","HANK/Claire","","Esports")
     //  or die("not in hank");
     // echo "We in hank";
     //
     // mysqli_free_result($result);
     // mysqli_close($link);


  ?>
