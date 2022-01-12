<?php
require_once __DIR__.'/../../Database.php';
class Repository
{
    private static $database = null;

    protected static function getRepository() : Database{
        if(self::$database == null) {
            self::$database = new Database();
        }
        return self::$database;
    }
}