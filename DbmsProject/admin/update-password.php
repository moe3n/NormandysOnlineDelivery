<?php include('partials/menu.php');?> 


<div class="main-content">
	<div class="wrapper">
		<h1>Change Password</h1>
		<br><br>
		<?php 
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
			}


		?>
		<form action="" method="POST">

				<table class="tbl-30">
					<tr>
						<td>Current Password:</td>
						<td>
							<input type="password" name="current_password" placeholder="Current password">
						</td>
					</tr>
					<tr>
						<td>New Password:</td>
						<td>
							<input type="password" name="new_password" placeholder="New Password">
						</td>
					</tr>
					<tr>
						<td>Confirm Password:</td>
						<td>
							<input type="password" name="confirm_password" placeholder="Comfirm Password">
						</td>
					</tr>
					<tr>
						
						<td colspan="2">
							<input type="hidden" name="id"value="<?php echo $id;?>">
							<input type="submit" name="submit" value="change password" class="btn-secondary">
						</td>
					</tr>
				</table>


		</form>
	</div>
</div>
<?php
//check weathe is submit button is clicked or not
if (isset($_POST['submit'])) {
	//echo "clicked";
	//1.get the the data from form
	$id=$_POST['id'];
	$current_password=md5($_POST['current_password']);
	$new_password=md5($_POST['new_password']);
	$confirm_password=md5($_POST['confirm_password']);
	//2.check weather the user with current id and current password exists or not  
	$sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
	//excute query
	$res=mysqli_query($conn,$sql);

	if ($res==TRUE) {
		// check weather data is found or not
		$count=mysqli_num_rows($res);
		if ($count==1) {
			//user exist and password can be change
			//echo "User found";

			//check weather the new password and comfirm password match or not
			if ($new_password==$confirm_password) {
				// update the paaword
				$sql2="UPDATE tbl_admin SET
				password='$new_password
				WHERE id=$id";

				//execute the query
				$res2=mysqli_query($conn,$sql);

				//check weather query is executed or not
				if ($res2==TRUE) {
					// display success massege 
					$_SESSION['change-password']="Password successfully change";
					//redirect the user
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
				else
				{
					//display error massege
					$_SESSION['change-password']="Failed to changed password";
					//redirect the user
					header('location:'.SITEURL.'admin/manage-admin.php');


				}


			}
			else{
				//redirect to manage admin page and show error massege
				$_SESSION['password-not-match']="Password did not match";
				//redirect the user
				header('location:'.SITEURL.'admin/manage-admin.php');

			}


		}
		else{
			//user does not exist set massege error
			$_SESSION['user-not-found']="User not Found";
			//redirect the user
			header('location:'.SITEURL.'admin/manage-admin.php');
		}
	}
	//3.check weathe the new password and confirm password match or not
	//4.change password if all above is true 

}


?>
<?php include('partials/footer.php');?>  