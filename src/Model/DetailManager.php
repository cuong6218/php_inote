<?php

namespace App\Model;

class DetailManager
{
    private $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function showInfo()
    {
        $sql = "";
    }
}
