<?php
    //echo "in checkData.php";
    include("DBCnct.php");
    final class checkData{
        private $dbase;
        private $con;
        private $email;
        private $smt;
        private $dbcnct;
        
        public function __construct(){
            $this->dbase = "oneatstop";
            $this->dbcnct = new DBCnct();
            $this->con = $this->dbcnct->getConnection();
        }
                
        private function checkEmail(){
            if(isset($_POST["userEmail"])){
                $emailId = $_POST["userEmail"];
                $checkData = "select email from ".$this->dbase.".signup where email = ?";
                $this->smt = $this->con->prepare($checkData);
                $this->smt->bind_param("s", $emailId);
                $this->smt->execute();
                $result = $this->smt->get_result();
                $this->email = $result->fetch_assoc();
                if($this->email["email"])
                    echo "Email already exists!";
//                 else 
//                     echo "<br/>OK<br/>";
                $this->smt->close();
                $this->con->close();
                exit();
            }
        }
        
        public function execute(){
            try{
                $this->checkEmail();
            }catch(Exception $e){ $e->getMessage(); }
        }
    }
?>
<?php 
    try{
        $obj = new checkData();
        $obj->execute();
    }catch(Exception $e){
        $e->getMessage();
    }
?>