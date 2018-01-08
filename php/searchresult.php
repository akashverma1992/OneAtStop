<?php 
    include ('./classes/DBCnct.php');
    
    class SearchTerm{
        private $con;
        private $dbcnct;
        private $smt;
        private $searchTerm;
        private $sqlSearch;
        
        public function __construct(){
            $this->dbcnct = new DBCnct();
            $this->con = $this->dbcnct->getConnection();
            
            if(isset($_POST["submit"]))
                $this->searchTerm = $_POST["searchText"];
        }
        
        public function searchQuery(){
            try{
                $this->sqlSearch = "select * from oneatstop.signup where username like ?";
                echo $this->sqlSearch;
                $this->smt = $this->con->prepare($this->sqlSearch);
                $this->smt->bind_param("s", $this->searchTerm);
                $this->smt->execute();
                //$this->smt->bind_result($user_id, $username, $password, $email, $phone);
                $result = $this->smt->get_result();
                echo"<hr/>";
                while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    foreach ($row as $r) {
                        print "$r ";
                    }
                    print "<br/>";
                }
            }catch (Exception $e){ $e->getMessage(); }
        }
    }
    
    $searchTerm = new SearchTerm();
    $searchTerm->searchQuery();
?>