<?php

namespace Model;

abstract class Connect {

    const HOST = "Localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS = null;

    public static function seConnecter(){
        try{
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        } catch(\PDOException $ex){
            return $ex->getMessage();
        }
    }
}