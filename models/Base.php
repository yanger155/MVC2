<?php
namespace models;

use PDO;

class Base 
{
    public static $pdo = null;
    public function __construct()
    {
        // pan'da
        if(self::$pdo === null)
        {
            // $config = config('db');
            self::$pdo = new \PDO('mysql:host=127.0.0.1;dbname=blog','root','');
            self::$pdo->exec('SET NAMES utf8');

        }
    }
}