<?php
$searchTerm = $_POST['searchText'];


$query="select * from vendor where username like '%".$searchTerm."%'";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)){
	echo $row['username'];
	echo "<br>";
	echo $row['shop_name'];
} 
?>