<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class mysqlConnection
{
    private ?PDO $connection = null;
    public function __construct(
        string $host,
        string $database,
        string $user,
        string $password = ""
    ) {
        try {
           $dsn = "mysql:host=$host; dbname=$database";
            $this->connection = new PDO(
                "mysql:host=$host; dbname=$database", $user, $password);
        } catch (PDOException $err) {
            print "Error!: " . $err->getMessage() . "<br>"; 
        }
    }
    public function getConnection(): ?PDO {
        return $this->connection;
    }

    
}
    
?>