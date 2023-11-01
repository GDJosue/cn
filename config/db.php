<?php
class Database{
    public static function connect(){
        $hostname_localhost ="localhost";
		$database_localhost ="user";
		$username_localhost ="user";
		$password_localhost ="password";
        $db = new mysqli($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
        $db -> query("SET NAMES 'utf8'");
        return $db; 
    }
}
