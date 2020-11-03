<?php
class Comment {
        public static function createComment($commentBody, $idposts, $idusers) {

                if (strlen($commentBody) > 160 || strlen($commentBody) < 1) {
                        die('Incorrect length!');
                }

                if (!DB::query('SELECT idposts FROM goodvibes.posts WHERE idposts=:idposts', array(':idposts'=>$idposts))) {
                        echo 'Invalid post ID';
                } else {
                        DB::query('INSERT INTO goodvibes.comments VALUES (NULL, :comment, :idusers, NOW(), :idposts)', array(':comment'=>$commentBody, ':idusers'=>$idusers, ':idposts'=>$idposts));
                }

        }

        public static function displayComments($idposts) {
            
            $comments = DB::query('SELECT goodvibes.comments.comment, goodvibes.users.username FROM goodvibes.comments, goodvibes.users
            WHERE idposts = :idposts
            AND goodvibes.comments.idusers = goodvibes.users.idusers', array(':idposts'=>$idposts));
            // print_r($comments);
            if(is_array($comments) || is_object($comments)){
                foreach($comments as $comment) {
                    echo $comment['comment']." ~ ".$comment['username']."<hr />";
                }
            }
        }
}
?>