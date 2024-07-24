<?php
class Database 
{
    private $dbhost = DB_HOST;
    private $dbname = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    protected $dbh;
    protected $stmt;
    protected $error;


    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password,
            $options);
        } 
        catch(PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
        }
    }
    // Prepare statement with query
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }
    // Bind values
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }
    // Get result set as array of objects
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Get single record as object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Get row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }
    // Close statement
    public function close() {
        $this->dbh = null;
    }

}
