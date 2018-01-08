<?php
require_once ("DBCnct.php");

class Login{
    private $con;
    private $dbcnct;
    private $searchterm;
    private $smt;
    private $password;
    
    public function __construct(){
        session_start();
        $this->dbcnct = new DBCnct();
        $this->con = $this->dbcnct->getConnection();
    }
    
    public function buildSearchTerm(){
        if(isset($_POST["submit"])){
            $this->searchterm = "select role, password from oneatstop.signup "."where username = ? limit 1";
            $this->smt = $this->con->prepare($this->searchterm);
            $this->smt->bind_param("s", $_POST["username"]);
            $this->authenticateUser();
        }
    }
    
    public function authenticateUser(){
        $this->smt->execute();
        $result = $this->smt->get_result();
        $this->password = $result->fetch_assoc();
        
        // Hashing the password with its hash as the salt returns the same hash
        if ( hash_equals($this->password["password"], crypt($_POST["password"], $this->password["password"]) ) ) {
            // echo crypt($_POST["password"], $this->password["password"])."<br/>";
            // echo $this->password["password"]."<br/>";
            // echo "Valid User";
            $this->smt->close();
            $this->con->close();
            $this->redirect();
        }else{
            echo "Invalid username or password! Try again".
            "<br/>"."<a href=../login.php>Go Back</a>";
        }        
    }
    
    public function setCookie() {
        setcookie('un', $_POST["username"]);
    }
    
    public function redirect() {
        if(isset($_POST["remember"])){
            if($_POST["remember"] === "ok")
                $this->setCookie();
        }else{
            unset($_COOKIE["un"]);
        }
        $_SESSION["role"] = $this->password["role"];
        if($this->password["role"] === "buyer"){
            $_SESSION['buyername'] = $_POST["username"];
            $_SESSION['password'] = $_POST["password"];
            header("location:../buyer.php");
            exit();                
        }else{
            $_SESSION['vusername'] = $_POST["username"];
            $_SESSION['password'] = $_POST["password"];
            header("location:../vendor.php");
            exit();
        }
    }
    
    public function perform(){
        try{
            if(isset($_POST["submit"])){
                $this->buildSearchTerm();
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
$login = new Login();
$login->perform();
?>