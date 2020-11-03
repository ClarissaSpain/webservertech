<?php
include('includes/db_connection.php');
include('includes/Login.php');
//TODO: Fix logical errors with line 55
//update password while already logged in

if (Login::isLoggedIn()) {
        
        if (isset($_POST['updatepassword'])) {
                //variables
                $oldpassword=$_POST['oldpassword'];
                $newpassword=$_POST['newpassword'];
                $newpasswordrepeat=$_POST['newpasswordrepeat'];
                $idusers= Login::isLoggedIn();
                //verify oldpassword to current password
                if(password_verify($oldpassword, DB::query('SELECT password FROM goodvibes.users WHERE idusers=:idusers', array(':idusers'=>$idusers))[0]['password'])) {
                        if($newpassword == $newpasswordrepeat){
                                if (strlen($newpassword)>= 6 && strlen($newpassword)<= 60){
                                        DB::query('UPDATE goodvibes.users SET password=:newpassword WHERE idusers=:idusers', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':idusers'=>$idusers));
                                        echo 'Password change successfully!';
                                }

                        }else{
                                echo 'Passwords don\'t match';
                        }
                }else{
                        echo 'Incorrect old password';
                }

        }

} else {
        //using new password token from forgot_password.php
        $tokenIsValid = False;
        if (isset($_GET['token'])){
        $token = $_GET['token'];
        if(DB::query('SELECT idusers FROM goodvibes.password_tokens WHERE token=:token', array(':token'=>sha1($token)))) {

        $idusers= DB::query('SELECT idusers FROM goodvibes.password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['idusers'];
        $tokenIsValid = True;

        if (isset($_POST['updatepassword'])) {

                
                $newpassword=$_POST['newpassword'];
                $newpasswordrepeat=$_POST['newpasswordrepeat'];
                $idusers= Login::isLoggedIn();
                //verify oldpassword to current password
               
                        if($newpassword == $newpasswordrepeat){
                                if (strlen($newpassword)>= 6 && strlen($newpassword)<= 60){
                                        DB::query('UPDATE goodvibes.users SET password=:newpassword WHERE idusers=:idusers', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':idusers'=>$idusers));
                                        echo 'Password change successfully!';
                                        //since password has changed we want to delete our change password token
                                        DB::query('DELETE FROM goodvibes.password_tokens WHERE idusers=:idusers', array(':idusers'=>$idusers));
                                        //token will no longer be valid and we get an error
                                }

                        }else{
                                echo 'Passwords don\'t match';
                        }
               
        }


        }else{
                die('Token invalid');
        }
}else{


        die('Not logged in');
}
}

?>
<h1>Update your Password</h1>
<form action="<?php if (!$tokenIsValid) { echo 'update_password.php'; } else { echo 'update_password.php?token='.$token.''; } ?>" method="post">
        <?php if (!$tokenIsValid) {echo '<input type="password" name="oldpassword" value="" placeholder="Old Password ..."><p />'; } ?>
        <input type="password" name="newpassword" value="" placeholder="New Password ..."></br>
        <input type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password ..."></br>
        <input type="submit" name="updatepassword" value="Update Password">
        
</form>