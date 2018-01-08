<?php
include("DBCnct.php");
include("EncryptPasswords.php");

//forgot password before session
class ForgotPasswords{
    private $con;
    private $smt;
    private $dbcnct;
    private $encryptPwd;
    private $role;
    private $username;
    
    public function __construct(){
        $this->dbcnct = new DBCnct();
        $this->con = $this->dbcnct->getConnection();
    }
    
    private function encryptPassword(){
        $encryptPassword = new EncryptPasswords($_POST["newpassword"]);
        $this->encryptPwd = $encryptPassword->hash();
        echo $this->encryptPwd;
    }
    
    private function selectRole(){
        $selectRole = "select role from oneatstop.signup where email = ?";
        $smt = $this->con->prepare($selectRole);
        $smt->bind_param("s", $_POST["email"]);
        $smt->execute();
        $result = $smt->get_result();
        $this->role = $result->fetch_assoc();
        $this->role["role"] = strtolower($this->role["role"]);
        echo "<br/>".$this->role["role"];
        $this->userName();
    }
    
    private function userName(){
        $username = "select username from oneatstop.".$this->role["role"]." where email = ?";
        $smt = $this->con->prepare($username);
        $smt->bind_param("s", $_POST["email"]);
        $smt->execute();
        $result = $smt->get_result();
        $this->username = $result->fetch_assoc();
        echo $this->username["username"];
    }
    
    private function updateSignup(){
        $sqlUpdate = "update oneatstop.signup "."set password = ? where email = ?";
        $this->smt = $this->con->prepare($sqlUpdate);
        echo "<br/>".$sqlUpdate;
        $this->smt->bind_param("ss", $this->encryptPwd, $_POST["email"]);
        $check = $this->smt->execute();
        if($check)
            echo "inserted!";
        else
            echo "Failed";
    }
    
    private function updateUsers(){        
        $sqlUpdate = "update oneatstop.".$this->role["role"]." set password = ? where email = ?";
        $this->smt = $this->con->prepare($sqlUpdate);
        echo "<br/>".$sqlUpdate;
        $this->smt->bind_param("ss", $this->encryptPwd, $_POST["email"]);
        $check = $this->smt->execute();
        if($check)
            echo "inserted!";
        else
            echo "Failed";
    }
    
    private function redirect(){
        if($this->role["role"] == "vendor"){
            session_start();
            $_SESSION["vusername"] = $this->username["username"];
            header("location:../vendor.php");        
        }
        else{
            session_start();
            $_SESSION["buyername"] = $this->username["username"];
            header("location:../buyer.php");
        }
    }
    
    public function execute(){
        try{
            $this->encryptPassword();
            $this->selectRole();
            $this->updateSignup();
            $this->updateUsers();
            $this->redirect();
        }catch (Exception $e){
            $e->getMessage();
        }
    }
    
}//class ForgotPasswords
?>

<?php 
    try{
        $obj = new ForgotPasswords();
        if( isset($_POST["submit"]) )
            $obj->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>
