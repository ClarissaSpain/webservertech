<?php
  include('includes/db_connection.php');
  include('includes/Login.php');

  if (!Login::isLoggedIn()) {
    die("Not logged in.");
}

  if (isset($_POST['confirm'])){
    //checking to see if checkbox is checked
    if(isset($_POST['alldevices'])){
        DB::query('DELETE FROM goodvibes.login_tokens WHERE idusers=:idusers', array(':idusers'=>Login::isLoggedIn()));

    } else {
            if (isset($_COOKIE['SNID'])) {
                    DB::query('DELETE FROM goodvibes.login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
            }
            //to remove all cookies from the browser(s)
            if(isset($_COOKIE['SNID'])) {
                unset($_COOKIE['SNID']);
               unset($_COOKIE['SNID_']);
                setcookie('SNID', null, -1, '/');
                setcookie('SNID_', null, -1, '/');
            }
    }

}




  ?>
  <h1>Logout of your Account</h1>
  <p>Are you sure you would like to logout?</p>
  <form action="logout.php" method="post">
      <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?</br>
      <input type="submit" name="confirm" value="Confirm">
  </form>

