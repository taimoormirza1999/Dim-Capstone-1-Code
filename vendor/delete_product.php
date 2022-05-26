<?php
include('../db_con.php');
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "DELETE FROM `products` WHERE id=".$id;

    $query_result_del_product = mysqli_query($con, $query);
    if ($query_result_del_product) {
        header('location:view_products.php');
    }
}
?>