<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author Abigail
 */
class Connection {
    private $server = "localhost:3306";
    private $username = "riohurta_soporte";
    private $password = "&S0p0rt319&";
    private $database = "riohurta_turismo";
    private $link;
    
    
    /*

     * private $server = "localhost:3306";
    private $username = "riohurta_soporte";
    private $password = "&S0p0rT319&";
    private $database = "riohurta_turismo";
    private $link;
     * 
     * private $server = "localhost:3306";
    private $username = "root";
    private $password = "root";
    private $database = "riohurta_turismo";
    private $link;
     * 
     * 
     * 
     *      */

    function __construct() {
        $this->link = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        $this->link->set_charset("utf8");
        
    }

    public function query($sql) {
        return $this->link->query($sql);
    }
    
    
}
