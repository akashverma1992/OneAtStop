<?php
class EncryptPasswords{
    //private $username;
    private $password;
    private $cost;
    private $salt;
    private $hash;
    
    function __construct($password){
        //$this->username = $username;
        $this->password = $password;
       
        // A higher "cost" is more secure but consumes more processing power
        $this->cost = 10;
    }
    
    public function hash(){
       // Create a random salt
       $this->salt = strtr(base64_encode(random_bytes(16)), '+', '.');
       
       // Prefix information about the hash so PHP knows how to verify it later.
       // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
       $this->salt = sprintf("$2a$%02d$", $this->cost) . $this->salt;
       
       // Value:
       // $2a$10$eImiTXuWVxfM37uY4JANjQ==
       
       // Hash the password with the salt
       $this->hash = crypt($this->password, $this->salt);
       //echo $this->hash;
       return $this->hash;
   }
}
?>
<?php 
// $obj = new EncryptPasswords("1234");
// echo $obj->hash();
?>