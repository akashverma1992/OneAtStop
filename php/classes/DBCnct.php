<?php
class DBCnct {
    private $host;
    private $port;
    private $user;
    private $pwd;
    private $dbase;
    
    //ctor
    public function __construct(){
        $this->host = "localhost";
        $this->port = 3306;
        $this->user = "root";
        $this->pwd = "root";
        $this->dbase = "oneatstop";
    }
    
    public function getConnection(){
        // $link = mysqli_init();
        $con;
        try{
            $con = new mysqli($this->host, $this->user, $this->pwd, $this->dbase);
            if($con)
                return $con;
            else
                echo "Connection not established: ";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}//class

// $dbcnct =  new DBCnct();
// $dbcnct->getConnection();
?>