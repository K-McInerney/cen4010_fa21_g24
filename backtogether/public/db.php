<?php

Database::Init();

class Database
{
    private static $pdo;

    public static function Init($force = false)
    {
        if ($force == true || self::$pdo == null)
        {
            $db_credentials = parse_ini_file("../credentials.ini");

            $host       = '127.0.0.1';
            $db         = $db_credentials['db_name'];
            $user       = $db_credentials['db_user'];
            $pass       = $db_credentials['db_password'];
            $charset    = 'utf8mb4';
    
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try
            {
                self::$pdo = new PDO($dsn, $user, $pass, $options);
            }
            catch (\PDOException $e)
            {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }

    public static function QueryNoReturn($query, ...$args)
    {
        $stmt = (self::$pdo)->prepare($query);
        $stmt->execute($args);
    }

    public static function Query($query, ...$args)
    {
        $stmt = (self::$pdo)->prepare($query);
        $stmt->execute($args);
        return $stmt->fetchAll();
    }


}