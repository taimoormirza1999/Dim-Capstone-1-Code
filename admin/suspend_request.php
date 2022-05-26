<?php
include('../db_con.php');
// echo "Success33";

// Suspend User -------------------------------------------------------
$msg="";
if(isset($_POST['Sus_method']) ){
 $sus_user_id=$_POST['sus_user_id'];
 $sus_date=$_POST['suspend_date'];
// echo "<script>alert('u_id".$sus_user_id."');</script>";
// echo "u_id: ".$sus_user_id.' sus_date: '.$sus_date;
// echo "<script>alert('second');</script>";
	$query="UPDATE `admin_users` SET `user_status`='suspend' , `suspended_date`='$sus_date'  WHERE id=".$sus_user_id;
	
	$query_result =mysqli_query($con,$query);
	if($query_result){
		echo"User has been Suspended";
		
    }else{

        echo"User has not been Suspended";
    }
}
?>