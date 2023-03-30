<?php
	//include constants.php file here
   include('../config/constants.php');
   //1.get the id of admin to be deleted
    $id=$_GET['id'];


   //2.create sql query to delete admin
    $sql="DELETE FROM tbl_admin WHERE id=$id";


    //execute the quary
    $res=mysqli_query($conn,$sql);
    //check weathe the query is executed successfully or not
    if($res==TRUE)
    {
    	//query executed successfully and admin deleted 
    	//echo"admin deleted";
    	//create session variable to display massege
    	$_SESSION['delete']="Admin deleted Successfully";
    	//redirect to manage admin page
    	header('location:'.SITEURL.'admin/manage-admin.php');


    }
    else
    {
    	//failed to delete admin
    	//echo"admin not deleted";
    	$_SESSION['delete']="Admin not deleted.Try again please";
    	//redirect to manage admin page
    	header('location:'.SITEURL.'admin/manage-admin.php');
    }

   //3.redirect to manage admin page with massege (success/fail)





?>