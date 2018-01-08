<head>
<?php
	require_once ("headfiles/vendor_head.php");
	require_once ("./classes/DBCnct.php");
	
	class Profile{
	    private $con;
	    private $dbcnct;
	    private $sqlSearch;
	    private $smt;
	    public $row;
	    
	    public function __construct(){
	        $this->dbcnct = new DBCnct();
	        $this->con = $this->dbcnct->getConnection();
	    }
	    
	    public function getData(){
	        try{
	            $this->sqlSearch = "select * from oneatstop.vendor where username like ?";
	            $this->smt = $this->con->prepare($this->sqlSearch);
	            $this->smt->bind_param("s", $_SESSION["vusername"]);
	            $this->smt->execute();
	            $result = $this->smt->get_result();
	            echo"<hr/>";
	            $this->row = $result->fetch_array();
	        }catch (Exception $e){ $e->getMessage(); }
	    }
	}
	
	$obj = new Profile();
	$obj->getData();
?>
<style>
	#table{
		border: 1px solid lightgray;
		margin-top:50px;
		width:50%;
	}
	.field{
		color:blue;
	}
</style>
</head>
<body>
	<div id='table' class='container'>
		<h3 style="text-align:center;">Profile</h3>
		<?php echo "<br/>",(isset($error)?$error:'');?>
	      <table class="table table-striped table-condensed" >
			<form action='' method='post' role="form" enctype="multipart/form-data">
				<tr>
					<td class='field'><label>Vendor ID</label></td>
					<td><label style="margin-top:5px;"><span class="label label-info"><?php echo $obj->row['user_id'];?></span></label></td>
				</tr>
				<tr>
					<td class='field'><label>Vendor Name</label></td>
					<td><input name='username' type='text' value="<?php echo $obj->row['username'];?>" class="form-control" readonly></input></td>
				</tr>
				<tr>
					<td class='field'><label>Email id</label></td>
					<td><input name='email' type='email' value="<?php echo $obj->row['email']?>" class="form-control" readonly></input></td>
				</tr>
				<tr>
					<td class='field'><label>Shop Name</label></td>
					<td><input name='shop_name' type='text' value="<?php echo $obj->row['shop_name']?>" class="form-control" readonly></input></td>
				</tr>
				<tr>
					<td class='field'><label>Shop Address</label></td>
					<td><input name='shop_address' type='text' class="form-control" value="<?php echo $obj->row['shop_address']?>" readonly></input></td> 
				</tr>
				<tr>
					<td class='field'><label>Shop Type</label></td>
					<td><input name='shop_type' type='text' value="<?php echo $obj->row['shop_type']?>" class="form-control" readonly></input></td>
				</tr>
				<tr>
					<td class='field'><label>Pincode</label></td>
					<td><input name='pincode' type='text' value="<?php echo $obj->row['pincode']?>" class="form-control" readonly></input></td>
				</tr>
				<tr>
					<td class='field'><label>Phone</label></td>
					<td><input name='phone' type='text' value="<?php echo $obj->row['phone']?>" class="form-control" readonly></input></td>
				</tr>
				<tr>
					<td><label class="field">Cover Picture</label></td>
					<td><label><?php echo $obj->row['cover'];?></label></td>
				</tr>
				<tr>
					<td><label class="field">Change Cover Picture</label></td>
					<td colspan="3"><input id='cpic1' type='file' name="cpic" class="btn"></input></td>
					<!--<td><input id='cpic2' type='submit' name='submit' value='Upload' class="btn btn-primary"></input></td>-->
				</tr>
				<tr>
					<td></td>				
					<td colspan="3">
						<button id='edit' type='button' class="btn btn-primary" name="edit">EDIT PROFILE</button>
						<button id='update' type='submit' class="btn btn-success" name="update">UPDATE PROFILE</button>
						<button id='cancel' type='button' class="btn btn-danger" name="cancel">CANCEL</button>
					</td>
				</tr>
			</form>
		</table>
	</div>
</body>

<script type="text/javascript">
	$(function(){
		$('#cpic1').hide();
		$('#update').hide();
		$('#cancel').hide();
		$('#edit').click(function(){			
			$('input[type=text]').prop("readonly",false); 
			$('input[type=email]').prop("readonly",false); 
			$('textarea').prop("readonly",false); 
			$('#update').show();	
			$('#cancel').show();	
			$('#cpic1').show();			
		});
		$('#cancel').click(function(){
			$('input[type=text]').prop("readonly",true); 
			$('input[type=email]').prop("readonly",true); 
			$('textarea').prop("readonly",true); 
			$('#update').hide();
			$('#cancel').hide();
			$('#cpic1').hide();
		});
	});
</script>
