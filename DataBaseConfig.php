<?php

class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $databasename;
    public $port;

    public function __construct()
    {

        $this->servername = 'localhost';
        $this->username = 'admin';
        $this->password = 'dspock01';
        $this->databasename = 'juicyMuscles';
        $this->port = 3306;

    }
}

?>
