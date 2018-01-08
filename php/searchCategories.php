<!-- searchCategories.php -->
<?php
require_once("./headfiles/head.php");
require_once("./classes/DBCnct.php");

class SearchCategories{
    private $search;
    private $con;
    private $dbcnct;
    private $smt;

    public function __construct(){
        $this->search = $_GET['search'];
        echo "<p>Search Results for <b>'".ucfirst($this->search)."'</b></p>";
        $this->dbcnct = new DBCnct();
        $this->con = $this->dbcnct->getConnection();
    }

    public function search(){
        try{
            $search2 = "select username, shop_type, URL from vendor where shop_type like ?";
            $this->smt = $this->con->prepare($search2);
            $this->smt->bind_param("s", $this->search);
            $this->smt->execute();
            $result = $this->smt->get_result();
            echo "<div class='list-container'>";
            while ($row = $result->fetch_array()) {                        
                if($row["shop_type"] === $this->search){
                    echo "<div class='list'>";
                    echo "<a href='./pageresults/VendorPage.php?".$row["username"]."' id='a1'>"
                    .$row["username"]."</a>"."<hr/>";
                    echo "<a href='".$row["URL"]."' id='a2'>".$row["URL"]."</a>";
                    echo "</div>";
                }
            }
            echo "</div>";
            $this->smt->close();
            $this->con->close(); 
        }catch(Exception $e){ $e->getMessage(); }
    }
}
$obj = new SearchCategories();
$obj->search();
?>
<br/>
<style>
p{
    text-align: center;
    margin-top: 60px;
    margin-left:20%;
    margin-right:20%;
    font-size: 22px;
}
.list-container {
    margin-left:20%;
    margin-right:20%;
    background-color: #e7e7e7;
    border-radius: 7px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.list {
    padding: 10px;
    margin-bottom: 10px;
    background-color: #ffffff;
    border-radius: 7px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#a1{
    color:blue;
    text-decoration: none; 
    font-size: 22px;
}
#a1:hover{
    color:orange;
    text-decoration: none; 
    font-size: 22px;
}
#a2{
    color:green;
    text-decoration: none; 
    font-size: 13px;
}
#a2:hover{
    color:red; 
    font-size: 13px;
}
</style>