<?php
include('../db_con.php');
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "DELETE FROM `designs` WHERE id=".$id;

    $query_result_del_design = mysqli_query($con, $query);
    if ($query_result_del_design) {
        // $msg = "Design Added Successfully";
        header('location:view_designs.php');
    }
}
?>