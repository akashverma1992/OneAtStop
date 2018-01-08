<?php
/*

class to handle database
*/

class db{
	private $username;
	private $password;
	private $dbname;
	private $dbserver;
	
	function __construct(){
        	$this->username = "root";
        	$this->password = "root";
        	$this->dbname = "jims_rahul";
        	$this->dbserver = "localhost";
    }
    
	function connect(){ 
		$con = mysqli_connect($this->dbserver, $this->username, $this->password, $this->dbname);
		return $con;
    }
    
    public function getdata($con){
        /*read data from users table*/
        $query="select * from users";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result)){
        	   $rows[]=$row;//create new array $rows
        }
        return $rows;
    }
					  				  
	public function getposts($con){
		$query="select * from post";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)){
			$rows[]=$row;
		}
		
		return $rows;
	}
	
	public function onePost($con,$id){
		
		$query="select * from post where id='$id'";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	
	public function saveComment($con,$post){
		extract($post);
		$query="insert into comments ( post_id,comment_desc,comment_date)values('$id','$comment_desc',now())";
		$result=mysqli_query($con,$query);
		return $result;
	}
	
	public function getAllComments($con,$id){
		//read all comments of $id
		$query="select * from comments where post_id='$id'";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)){
			$rows[]=$row;
		}return $rows;
	}
    //download file
    public function downloadFile(){
        	header ("content-type:application/$ft");
        	header("content-disposition:attachment;filename='$fn'");
        	readfile('image/'.$fn);
    }

}//class end 
?>