<?php
include("includes/db_connection.php");

if(isset($_POST['createaccount'])) {
  $gamertag = $_POST['gamertag'];
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  // $phone = $_POST['phone'];

  //check to see if gamertag matches other gamertags in the database:

  if(!DB::query('SELECT gamertag FROM esports.players WHERE gamertag=:gamertag', array(':gamertag'=>$gamertag))){

    //check to see the length of the gamertag
    if (preg_match('/[a-zA-Z0-9_]+/', $gamertag)){
      //check for gamertag expression
      if (preg_match(' /^[A-Za-z][A-Za-z0-9]{5,31}$/', $gamertag)){
        //check for length of password
          if (strlen($password)>= 6 && strlen($password)<= 60){
        //check email through php also using PHP hash to hash the password to keep it secure
          if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            //check if email is already used
            if (!DB::query('SELECT email FROM esports.players WHERE email=:email', array(':email'=>$email))) {
      DB::query('INSERT INTO esports.players VALUES (NULL, :gamertag, :fullname, :password, :email)', array(':gamertag'=>$gamertag, ':fullname'=>$fullname, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));  

  echo "Success!";
            }else {
              echo 'Email in use!';
            }
        } else {
                                    echo 'Invalid email!';
                            }
                    } else {
                            echo 'Invalid password!';
                    }
                    } else {
                            echo 'Invalid gamertag';
                    }
            } else {
                    echo 'Invalid gamertag';
            }

    } else {
            echo 'User already exists!';
    }
}


?>


<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Montana ESports</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="mystyle.css">
</head>

<body>

<div>
  <div id="app">
    <div>
      <main class="flex-container parent">
        <div class="div1">
          <img src="griz.jpg" alt="Griz Esports Logo" width="500">

        </div>
        <div class="div2">
          <!-- background -->
          <div class="">
            <!-- container -->
            <div class="">
              <!-- white background on form -->
              <h2>Join the Family!</h2>
              <h1>Register</h1>
              <form action="register.php" method="post">
                <div class="">
                  <label for="gamertag"></label>
                  <input type="text" name="gamertag"  placeholder="GamerTag" required>
                  <!-- Gamer Tag -->

                </div>
                <div class="">
                  <!-- Email -->
                  <input type="text" name="email"  placeholder="someone@somesite.com" required>

                </div>
                <div class="">
                  <input type="text" name="fullname"  placeholder="Full Name ..." required>
                  <!-- <input type="text" name="lastName" placeholder="Last name" required> -->

                </div>
                <div class="">
                  <!-- password -->
                  <input type="text" name="password"  placeholder="********" required> <br>
                </div>
                <div class="">
                  <!-- Phone -->
                  <input type="text" name="phone"  placeholder="Phone Number" required>
                  
                </div>
                <input type="submit" name="createaccount" value="Create Account">
</form>
                <!-- <div class=""> -->
                  <!-- I play... -->
                  <!-- <label for="iplay">I play...</label><br> -->
                  <!-- <form action="register.php" method="get"> -->
                    <!-- <input type="checkbox" name="favGame" value="tetris" /> Tetris <br> -->
                    <!-- <input type="checkbox" name="favGame" value="valorant" /> Valorant <br> -->
                    <!-- <input type="checkbox" name="favGame" value="fortnite" /> Fortnite <br> -->
                    <!-- <input type="checkbox" name="favGame" value="pokemongo" /> Pokemon Go <br> -->
                    <!-- <input type="checkbox" name="favGame" value="smashbros" /> Smash Bros <br> -->
                    <!-- <input type="checkbox" name="favGame" value="league" /> League of Legends <br> -->
                    <!-- <input type="checkbox" name="favGame" value="overwatch" /> Overwatch <br> -->
                    <!-- <input type="checkbox" name="favGame" value="starcraft" /> Starcraft II <br> -->
                    <!-- <input type="checkbox" name="favGame" value="warcraft" /> World of Warcraft <br> -->
                    <!-- <input type="checkbox" name="favGame" value="apex" /> Apex -->
                    <!-- <br> -->
                    <!-- <br> -->
                    <!-- <input type="checkbox" name="subscribe" value="correspondences"/> Subscribe to Correspondences -->
                    <!-- <br> -->
                    <!-- <input type="checkbox" name="codeOfConduct" value="code"/> Agree to Student Code of Conduct -->

                  <!-- </form> -->
                  <!-- <form method="get" action ="register.php"> -->
                   

                  <!-- </form> -->
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
                <p>Already registered? <a href="users.php">Login here</a>.</p>

              </div>

            </div>

          </div>

        </div>
      </main>

    </div>


  </div>


</body>

</html>
