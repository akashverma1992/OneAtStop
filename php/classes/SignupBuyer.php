<?php
require_once("DBCnct.php");
require_once("EncryptPasswords.php");

class SignupBuyer {
    private $con;
    private $smt;
    private $dbcnct;
    private $encryptPwd;

    function __construct() {
        $this->dbcnct = new DBCnct();
        $this->con = $this->dbcnct->getConnection();
    }

    function encrypt() {
        $encryptPassword = new EncryptPasswords($_POST["password"]);
        $this->encryptPwd = $encryptPassword->hash();
    }

    function insertSignup(){
        $sqlInsert = "insert into oneatstop.signup "."values(?,?,?,?,?)";
        $this->smt = $this->con->prepare($sqlInsert);
        $lastid = mysqli_insert_id($this->con);
        $username = $_POST['username'];
        $role = $_POST['role'];
        $email = $_POST["email"];
        $this->smt->bind_param("ssssi", $username, $this->encryptPwd, $role, $email, $lastid);
        echo $username." ".$this->encryptPwd." ".$role." ".$email." ".$lastid;
        $this->smt->execute();
    }

    function insertBuyer(){
        $sqlInsert = "insert into oneatstop.buyer "."values(?,?,?,?,?)";
        $this->smt = $this->con->prepare($sqlInsert);

        $lastid = mysqli_insert_id($this->con);
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $this->smt->bind_param("isssi", $lastid, $username, $this->encryptPwd, $email, $phone);
        echo $lastid." ".$username." ".$this->encryptPwd." ".$email." ".$phone;
        $inserted = $this->smt->execute();
        if($inserted){
            session_start();
            $_SESSION['buyername'] = $_POST['username'];
            header("location:../buyer.php");
            exit();
        }
        else
            echo "Values not inserted!";
        $this->smt->close();
        $this->con->close();
    }

    function executeInsert(){
        try{
            if(isset($_POST["submit"])){
                $this->encrypt();
                $this->insertSignup();
                $this->insertBuyer();
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>
<?php
    $buyer = new SignupBuyer();
    $buyer->executeInsert();
?>