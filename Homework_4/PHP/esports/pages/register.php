<?php
//Query String
if(isset($_GET["firstName"])){
    echo "<p>Hi, " . $_GET["firstName"] . "</p>";
}

//Cookie

if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}

//Session
session_start();

echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";

print_r($_SESSION);

?>
