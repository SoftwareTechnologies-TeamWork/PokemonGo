<?php
class Database
{
    private $link;
    private $hostname, $username, $password, $database;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->link = new mysqli($this->hostname, $this->username, $this->password, $this->database)
            OR die ("There was a problem connecting to the database!");
        
        return true;
    }

    public function query($query)
    {
        $result = $this->link->prepare($query);

        if (!$result) {
            die ("Invalid query: " . $this->link->error);
        }
        
        return $result;
    }

    public function __destruct()
    {
        $this->link->close()
            OR die ("There was a problem disconnecting from the database.");
    }
}