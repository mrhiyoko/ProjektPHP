<?php
class ConnectDb {

    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'projekt';

    private function __construct()
    {
		$this->conn = new mysqli(	$this->host,
									$this->user,
									$this->pass,
									$this->name);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$conn = ConnectDb::getInstance();
$test = $conn->getConnection();
$sql_query = "SELECT * FROM quotes";
$result = $test->query($sql_query)->fetch_row();
//$selc = $conn.getConnection("SELECT author FROM quotes WHERE id=1");
var_dump($result);