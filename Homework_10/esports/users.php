<?php
include("includes/db_connection.php");

// $gamertag= DB::query('SELECT * FROM esports.players WHERE gamertag=:gamertag', array(':gamertag'=>$_GET['gamertag']));
$userID = DB::query('SELECT userID FROM esports.players WHERE userID=:userID', array(':userID'=>$_GET['userID']))[0]['userID'];

if(isset($_GET['userinfo'])){
  // $gamertag = DB::query
  // htmlspecialchars
  
}

$dbusers = DB::query('SELECT * FROM esports.players WHERE userID=:userID ORDER BY userID DESC', array(':userID'=>$userID));
$users = "";
foreach($dbusers as $p){
    $users = ($p['gamertag']);
}



?>
<h1>Users</h1>
<form action="users.php" method="get">
  <input type="submit" name="user" value="User">
</form>

<div class="displayUsers">
  <?php  //echo $users; ?>
</div>