<?php

//https://code.tutsplus.com/tutorials/create-a-google-login-page-in-php--cms-33214

 include('includes/db_connection.php');
//checking to see if the form has been submitted...
 if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (DB::query('SELECT username FROM goodvibes.users WHERE username=:username', array(':username'=>$username))) {
            //verify password to the username entered via database
            if(password_verify($password, DB::query('SELECT password FROM goodvibes.users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
                echo 'Logged in';
                //set cookie for login token
                $cstrong = True;
                $token = bin2hex(openssl_random_pseudo_bytes( 64 , $cstrong));
                echo $token;
                 $idusers = DB::query('SELECT idusers FROM goodvibes.users WHERE username=:username', array(':username'=>$username))[0]['idusers'];
                DB::query('INSERT INTO goodvibes.login_tokens VALUES (NULL, :token, :idusers)', array(':token'=>sha1($token), ':idusers'=>$idusers));

                 setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);



            } else {
                echo 'Wrong password';
            }

        } else {
            echo 'User not registered';
        }
 }

?>



<h1>Login to your account</h1>
<form action="login.php" method="post">
<input type="text" name="username" value="" placeholder="Username ..."></p>
<input type="password" name="password" value="" placeholder="Password ..."></p>
<input type="submit" name="login" value="Login">
</form>