<?php
include('includes/db_connection.php');
//reset password page if user has forgotten
//TODO: Enable php mail function later?

if (isset($_POST['resetpassword'])){

    $cstrong = True;
    $token = bin2hex(openssl_random_pseudo_bytes( 64 , $cstrong));
    $email = $_POST['email'];
    $idusers = DB::query('SELECT idusers FROM goodvibes.users WHERE email=:email', array('email'=>$email))[0]['idusers'];
    DB::query('INSERT INTO goodvibes.password_tokens VALUES (NULL, :token, :idusers)', array(':token'=>sha1($token), ':idusers'=>$idusers));
    echo 'Email Sent.';
    echo '<br />';
    echo $token;

}


?>
<h1>Forgot Password</h1>
<form action="forgot_password.php" method="post">
    <input type="text" name="email" value="" placeholder="Email ..."></p>
    <input type="submit" name="resetpassword" value="Reset Password">

</form>