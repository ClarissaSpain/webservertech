<?php

class Post {
    public static function createPost($postbody, $loggedInIdUsers, $profileUserId){
        
        //check to see if its the right length
        if (strlen($postbody) > 160 || strlen($postbody) <1){
            die('Incorrect length!');    
        }
        //check to see if the user is posting to their profile only
        if ($loggedInIdUsers == $profileUserId){

        DB::query('INSERT INTO goodvibes.posts VALUES (Null, :postbody, NOW(), :idusers, 0)', array(':postbody'=>$postbody, ':idusers'=>$profileUserId));
        }else{
                die('Incorrect User');
        }
    }

    public static function likePost($idposts, $likerId ) {
        if (!DB::query('SELECT idusers FROM goodvibes.posts_likes WHERE idposts=:idposts AND idusers=:idusers', array(':idposts'=>$idposts, ':idusers'=>$likerId))) {
            DB::query('UPDATE goodvibes.posts SET likes=likes+1 WHERE idposts=:idposts', array(':idposts'=>$idposts));
            DB::query('INSERT INTO goodvibes.posts_likes VALUES (NULL, :idposts, :idusers)', array(':idposts'=>$idposts, ':idusers'=>$likerId));
            } else {
            //delete a like
            DB::query('UPDATE goodvibes.posts SET likes=likes-1 WHERE idposts=:idposts', array(':idposts'=>$idposts));
            DB::query('DELETE FROM goodvibes.posts_likes WHERE idposts=:idposts AND idusers=:idusers', array(':idposts'=>$idposts, ':idusers'=>$likerId));
            }
    }

    public static function displayPosts($idusers, $username, $loggedInIdUsers){
        $dbposts = DB::query('SELECT * FROM goodvibes.posts WHERE idusers=:idusers ORDER BY idposts DESC', array(':idusers'=>$idusers));
        $posts = "";
        foreach($dbposts as $p){
   
           if(!DB::query('SELECT idposts FROM goodvibes.posts_likes WHERE idposts=:idposts AND idusers=:idusers', array(':idposts'=>$p['idposts'], ':idusers'=>$loggedInIdUsers))){
   
                $posts .= htmlspecialchars($p['body'])."
                <form action='profile.php?username=$username&idposts=".$p['idposts']."' method='post'>
                    <input type='submit' name='like' value='Like'>
                    <span>".$p['likes']." likes</span>
                   </form>
                <hr/></br>
                ";
   
           } else {
                   $posts .= htmlspecialchars($p['body'])."
                   <form action='profile.php?username=$username&idposts=".$p['idposts']."' method='post'>
                           <input type='submit' name='unlike' value='Unlike'>
                           <span>".$p['likes']." likes</span>
                   </form>
                   <hr /></br />
                   ";
           }
        }
        return $posts;
    }
    
}


?>