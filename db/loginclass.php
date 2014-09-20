<?php
class logindb{
//database details!!
private $db_hostname = '*********';
private $db_database = '*********';
private $db_username = '*********';
private $db_password = '*********';
    //constructor calls the connect function, which connects
    function __construct(){
        $this->connect();
    } 
    
    //destructor calls the close function, which disconnects
    function __destruct(){
        $this->close();
    }

    function connect(){
        //connecting to the mysql database
        $connect = mysql_connect($this->db_hostname, $this->db_username, $this->db_password) or die(mysql_error());
        //selecting the database
        $db = mysql_select_db($this->db_database, $connect) or die(mysql_error());
    }

    function close(){
        //close the database connection!!
        mysql_close();
    }
}
?>