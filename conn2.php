<?php
class ConnectDb {
	// Hold the class instance.
	private static $instance = null;
	private $conn;
	
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $name = 'projekt';
	
	// The db connection is established in the private constructor.
	private function __construct()
	{
		$this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
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
$result = $test->query("SELECT author FROM quotes")->fetch();
var_dump($result);