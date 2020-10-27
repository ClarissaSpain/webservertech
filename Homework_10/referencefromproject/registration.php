<?php
  include('includes/db_connection.php');

  if(isset($_POST['createaccount'])) {
      $username = $_POST['username'];
      $fullname = $_POST['fullname'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      //check to see if username matches other usernames in the database:

      if(!DB::query('SELECT username FROM goodvibes.users WHERE username=:username', array(':username'=>$username))){

        //check to see the length of the username
        if (preg_match('/[a-zA-Z0-9_]+/', $username)){
          //check for username expression
          if (preg_match(' /^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)){
            //check for length of password
              if (strlen($password)>= 6 && strlen($password)<= 60){
            //check email through php also using PHP hash to hash the password to keep it secure
              if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                //check if email is already used
                if (!DB::query('SELECT email FROM goodvibes.users WHERE email=:email', array(':email'=>$email))) {
          DB::query('INSERT INTO goodvibes.users VALUES (NULL, :username, :fullname, :password, :email)', array(':username'=>$username, ':fullname'=>$fullname, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));  
    
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
                                echo 'Invalid username';
                        }
                } else {
                        echo 'Invalid username';
                }

        } else {
                echo 'User already exists!';
        }
}
  ?>

<h1>Register</h1>
<form action="registration.php" method="post">
<input type="text" name="username" value="" placeholder="Username ..."></p>
<input type="text" name="fullname" value="" placeholder="Full Name ..."></p>
<input type="password" name="password" value="" placeholder="Password ..."></p>
<input type="email" name="email" value="" placeholder="someone@somesite.com"></p>
<input type="submit" name="createaccount" value="Create Account">
</form>

