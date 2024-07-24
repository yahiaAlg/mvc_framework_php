<?php
class Post extends Database 
{   
    private $conn;
    public function __construct(){
        echo 'initializing database connection';
        $this->conn = new Database;
    }

    // function to fetch all the posts from the db
    public function fetchAllPosts(){
        $sql = "SELECT * FROM POST";
        $this->conn->query($sql);
        return $this->conn->resultSet();
    }        
}
