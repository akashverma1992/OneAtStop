<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
<script  language='javascript' src="bootstrap/js/bootstrap.min.js"></script>
<?php
include("classes/db_class.php");
$obj=new db();
$con=$obj->connect();
if(!$con){
	die("error");
}
$id=$_GET['id'];

$onePost=$obj->onePost($con,$id);
?>



<?php
if(isset($_POST['submit'])){
	//save the comment
if($obj->saveComment($con,$_POST)){
	echo 'comment is added';
}else{
	echo 'database error';
}
}
?>

<table>
<form action='' method='post' >
<input type='hidden' name='id' value="<?php echo $id ?>">
<div class='form-group'>
<label>enter comment</label><br>
<textarea name='comment_desc' rows=5 class='form-control'></textarea><br>
<input type='submit' name='submit' value='submit' class='btn-info' >
</div>
</form>	
</table>			

<?php
echo"<hr>";
echo "<h4>comments os post id :",$id,"</h4>";
$allComments=$obj->getAllComments($con,$id);
foreach($allComments as $oneComment){
	echo $oneComment['comment_date'],'<br>';
	echo $oneComment['comment_desc'],'<br>';
	echo'<hr>';
	
}
?>
