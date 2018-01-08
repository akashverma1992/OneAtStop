<?php
require_once("DBCnct.php");
require_once("EncryptPasswords.php");

class SignupVendor {
    private $con;
    private $smt;
    private $dbcnct;
    private $encryptPwd;

    function __construct() {
        echo $_POST['username']." ".$_POST['password']." ".$_POST['role']." ".$_POST['email']." ";
        echo $_POST['shop_name']." ".$_POST['shop_address']." ".$_POST['shop_type']." ";
        echo $_POST['pincode']." ".$_POST['phone']." ";
        echo $_FILES['cover']['name']."<br/>";
        $this->dbcnct = new DBCnct();
        $this->con = $this->dbcnct->getConnection();
    }

    function encrypt() {
        $encryptPassword = new EncryptPasswords($_POST['password']);
        $this->encryptPwd = $encryptPassword->hash();
    }

    function insertSignup(){
        $sqlInsert = "insert into oneatstop.signup "."values(?,?,?,?,?)";
        $this->smt = $this->con->prepare($sqlInsert);
        $lastid = mysqli_insert_id($this->con);
        $username = $_POST["username"];
        $role = $_POST["role"];
        $email = $_POST["email"];
        $this->smt->bind_param("ssssi", $username, $this->encryptPwd, $role, $email, $lastid);
        echo $username." ".$this->encryptPwd." ".$role." ".$email." ".$lastid;
        $this->smt->execute();
    }

    function insertVendor(){
        $sqlInsert = "insert into oneatstop.vendor "."values(?,?,?,?,?,?,?,?,?,?,?)";
        $this->smt = $this->con->prepare($sqlInsert);

        $lastid = mysqli_insert_id($this->con);
        $username = $_POST["username"];
        $email = $_POST["email"];
        $shopName = $_POST["shop_name"];
        $shopAddress = $_POST["shop_address"];
        $shopType = $_POST["shop_type"];
        $pincode = $_POST["pincode"];
        $phone = $_POST["phone"];
        $cover = "";
        $url = $_POST['url'];

        $this->smt->bind_param("issssssidss", $lastid, $username, $this->encryptPwd, $email, $shopName, $shopAddress, $shopType, $pincode, $phone, $cover, $url);

        /*echo "<br/>".$lastid." ".$username." ".$this->encryptPwd." ".$email." ".$phone." ";
        echo $shopName." ".$shopAddress." ".$shopType." ";
        echo $pincode." ".$cover." ".$url;*/

        $inserted = $this->smt->execute();
        if($inserted){
            session_start();
            $_SESSION['vusername'] = $_POST['username'];
            header("location:../vendor.php");
            exit();
        } else
            echo "<br/>Values not inserted!";

        $this->smt->close();
        $this->con->close();
    }

    function executeInsert(){
        try{
            if(isset($_POST["submit"])){
                $this->encrypt();
				$this->insertSignup();
                $this->insertVendor();
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

}//class Vendor
?>
<?php
//Instantiate class Vendor
$vendor = new SignupVendor();
$vendor->executeInsert();
?>