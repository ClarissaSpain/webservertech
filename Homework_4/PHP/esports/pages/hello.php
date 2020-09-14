<?php
session_start();
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";


$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Montana ESports</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../mystyle.css">
</head>

<body>

<div>


  <div id="app">
    <div>
      <main class="flex-container parent">
        <div class="div1">
          <img src="../img/Griz.jpg" alt="Griz Esports Logo" width="500">

        </div>
        <div class="div2">
          <!-- background -->
          <div class="">
            <!-- container -->
            <div class="">
              <!-- white background on form -->
              <h2>Join the Family!</h2>
              <form action="register.php" method="get">
                <div class="">
                  <label for="gamertag"></label>
                  <input type="text" name="gamertag"  placeholder="Gamer Tag" required>
                  <!-- Gamer Tag -->

                </div>
                <div class="">
                  <!-- Email -->
                  <input type="text" name="emailAddress"  placeholder="Email" required>

                </div>
                <div class="">
                  <input type="text" name="firstName"  placeholder="First name" required>
                  <input type="text" name="lastName" placeholder="Last name" required>

                </div>
                <div class="">
                  <!-- Username -->
                  <input type="text" name="username" placeholder="Username" required>

                </div>
                <div class="">
                  <!-- password -->
                  <input type="text" name="password"  placeholder="********" required> <br>
                  <input type="text" name=""  placeholder="Confirm password" required>
                </div>
                <div class="">
                  <!-- Phone -->
                  <input type="text" name="phone"  placeholder="Phone Number" required>
                  <input type="submit" name="create" value="Sign up">
                </div>
</form>
                <div class="">
                  <!-- I play... -->
                  <label for="iplay">I play...</label><br>
                  <form action="register.php" method="get">
                    <input type="checkbox" name="favGame1" value="tetris" /> Tetris <br>
                    <input type="checkbox" name="favGame2" value="valorant" /> Valorant <br>
                    <input type="checkbox" name="favGame3" value="fortnite" /> Fortnite <br>
                    <input type="checkbox" name="favGame4" value="pokemongo" /> Pokemon Go <br>
                    <input type="checkbox" name="favGame5" value="smashbros" /> Smash Bros <br>
                    <input type="checkbox" name="favGame6" value="league" /> League of Legends <br>
                    <input type="checkbox" name="favGame7" value="overwatch" /> Overwatch <br>
                    <input type="checkbox" name="favGame8" value="starcraft" /> Starcraft II <br>
                    <input type="checkbox" name="favGame9" value="warcraft" /> World of Warcraft <br>
                    <input type="checkbox" name="favGame10" value="apex" /> Apex
                    <br>
                    <br>
                    <input type="checkbox" name="subscribe" value="correspondences"/> Subscribe to Correspondences

                  </form>
                  <form method="get" action ="register.php">

                  </form>
                </div>
                <div class="">
                  <!-- console or PC -->

                </div>
                <div class=""><br>
                  <!-- Subscribe to correspondences -->


                </div>
                <div class="">
                  <!-- Register now Button -->
                  <!-- <button type="button" name="button">Register Now</button> -->



                </div>

              <div class="">
                <!-- already registered? login here -->
                <p>Already registered? <a href="./admin.html">Login here</a>.</p>

              </div>

            </div>

          </div>

        </div>
      </main>

    </div>


  </div>


</body>

</html>
