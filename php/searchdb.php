<?php
//seacrhDB.php
if(isset($_GET['term'])) {
    $searchTerm = $_GET['term'];
    include("classes/DBCnct.php");
    $query="select * from vendor where username like '%".$searchTerm."%'";
    $result=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)){
        	$data[] = $row['username'];
    }
    echo $data;
    echo json_encode($data);//send data in json format
}
?>