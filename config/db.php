<?php
class Database{
    public static function connect(){
        $hostname_localhost ="localhost";
		$database_localhost ="u750169748_cxqwL";
		$username_localhost ="u750169748_cSG7t";
		$password_localhost ="CNcc1805#";
        $db = new mysqli($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
        $db -> query("SET NAMES 'utf8'");
        return $db; 
    }
}