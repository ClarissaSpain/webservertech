<?php

class Login {

    public static function isLoggedIn() {

        if (isset($_COOKIE['SNID'])) {
                if (DB::query('SELECT idusers FROM goodvibes.login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))) {
                        $idusers = DB::query('SELECT idusers FROM goodvibes.login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['idusers'];

                        if (isset($_COOKIE['SNID_'])) {
                                return $idusers;
                        } else {
                                $cstrong = True;
                                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                DB::query('INSERT INTO goodvibes.login_tokens VALUES (NULL, :token, :idusers)', array(':token'=>sha1($token), ':idusers'=>$idusers));
                                DB::query('DELETE FROM goodvibes.login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                                //By setting multiple login tokens, users can log into muliple devices at any given time! Or give them an option to stay logged into all of their devices or none.

                                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                return $idusers;
                        }
                }
        }

        return false;
}
}