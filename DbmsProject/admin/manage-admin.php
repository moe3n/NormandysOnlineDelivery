
<?php include('partials/menu.php');?> 

    
<!--Main content section start-->
    <div class="main-content">
      <div class="wrapper">
        <h1>Manage Admin</h1>
        <br><br>
        <?php
            if (isset($_SESSION['add'])) 
            {
              echo $_SESSION['add'];//display session massege
              unset($_SESSION['add']);//removing session massege
            }


            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
            if(isset($_SESSION['user-not-found']))
            {
              echo $_SESSION['user-not-found'];
              unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['password-not-match']))
            {
              echo $_SESSION['password-not-match'];
              unset($_SESSION['password-not-match']);
            }
            if(isset($_SESSION['change-password']))
            {
              echo $_SESSION['change-password'];
              unset($_SESSION['change-password']);
            }



        ?>
        <br><br>
        <!--Button to add admin-->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>
        <table class="tbl-full">
          <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>
           
          <?php
          //quary to get all admin from database
              $sql="SELECT * FROM tbl_admin";
              //execute the quary
              $res=mysqli_query($conn,$sql);
              //check weathe the quary is executed or not
              if ($res==TRUE) 
              {
                //count rows to check weather we have data in database or not
                $count=mysqli_num_rows($res);//fuction to get all the rows in database
                $sn=1;//create a variable and assign the value
                //check the num of rows
                if ($count>0) 
                {
                  //data is in database
                  while ($rows=mysqli_fetch_assoc($res)) {
                    // using while loop to get all the data from database
                    //and  while loop will run as long as we have data in database
                    //get indivisul data
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                    //display the values in our table
                    ?>
                    <tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $full_name;?></td>
                        <td><?php echo $username;?></td>
                        <td>
                          <a href="<?php echo  SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>"class="btn-primary">Change Password</a>
                          <a href="<?php echo  SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                          <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                          
                        </td>
                      </tr>
                    <?php


                  }
                }
                else
                {
                  //no data in database
                }


              }

          ?>




          
        </table>
        
        <div class="clearfix"></div>

      </div>
    </div>
<!--Main content section End-->
<?php include('partials/footer.php');?>  
