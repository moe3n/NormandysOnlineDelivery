<?php include('partials/menu.php');?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<br><br>

		<?php
            if (isset($_SESSION['add'])) 
            {
              echo $_SESSION['add'];//display session massege
              unset($_SESSION['add']);//removing session massege
            }

        ?>
        <br>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" name="full_name" placeholder="Enter your full name"></td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" placeholder="Enter your user name "></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="Password" name="password" placeholder="Enter your Password">
					</td>
				</tr>
				<tr>
					
					<td colspan="2">
						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include('partials/footer.php');?>

<?php 
     //process value from form and save it in database
     //check weather the button is clicked or not
     if(isset($_POST['submit']))
     {
     		//button clicked
     	    //echo"clicked";
     	    //1.get data from form
     	    $full_name=$_POST['full_name'];
     	    $username=$_POST['username'];
     	    $password=md5($_POST['password']);//password encryption with md5

     	    //2.sql quary to save data into database
     	    $sql="INSERT INTO tbl_admin SET
     	         full_name ='$full_name',
     	         username='$username',
     	         password='$password'
     	          ";
     	    
            //3.executing  quary and saving data into database
     	    $res= mysqli_query($conn,$sql) or die(mysqli_error());   
     	    //4.check weather the(query is executed) data is inserted or not and display massege
     	    if($res==TRUE)
     	    {
     	    	//echo "data inserted";
     	    	//create a session variable to display massege
     	    	$_SESSION['add']="Admin Added Successfully";
     	    	//redirect page to manage admin
     	    	header("location:".SITEURL.'admin/manage-admin.php');
     	    }
     	    else
     	    {
				//echo "data not inserted";
				//create a session variable to display massege
     	    	$_SESSION['add']="Failed to add admin";
     	    	//redirect page to add admin
     	    	header("location:".SITEURL.'admin/add-admin.php');

     	    }

     }

?>