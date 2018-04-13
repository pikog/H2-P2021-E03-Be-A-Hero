<?
include_once './src/config.php';

/**
 * Database connection class
 */

class DB
{

    private $pdo;

    public function __construct()
    {
        try
        {
            // Try to connect to database
            $this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8;port='.DB_PORT, DB_USER, DB_PASS);

            // Set fetch mode to object
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function getInstance()
    {
        return $this->pdo;
    }
}