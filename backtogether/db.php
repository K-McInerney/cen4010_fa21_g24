<?php

Database::Init();

class Database
{
    private static $pdo;

    public static function Init($force = false)
    {
        if ($force == true || self::$pdo == null)
        {
            $host = '127.0.0.1';
            $db   = 'cen4010_fa21_g24';
            $user = 'cen4010_fa21_g24';
            $pass = 'edCgcpgTkp';
            $charset = 'utf8mb4';
    
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
    
    public static function Query($query, ...$args)
    {
        $stmt = (self::$pdo)->prepare($query);
        $stmt->execute($args);
        $results = $stmt->fetchAll();
        return $results;
    }

}

?>