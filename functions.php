<?php 
function get__total_designs($con,$user_id) {
    $query_get__total_designs = "SELECT * FROM `designs` WHERE user_id=".$user_id ;
    $get__total_designs_result_user = mysqli_query($con, $query_get__total_designs);
   echo mysqli_num_rows($get__total_designs_result_user);
}
function get__total_products($con,$user_id) {
    $query_get__total_products = "SELECT * FROM `products` WHERE user_id=".$user_id ;
    $get__total_products_result_user = mysqli_query($con, $query_get__total_products);
   echo mysqli_num_rows($get__total_products_result_user);
}
function get__total_register_users($con) {
    $query_get__total_register_users = "SELECT * FROM `admin_users`" ;
    $get__total_register_users_result_user = mysqli_query($con, $query_get__total_register_users);
   return mysqli_num_rows($get__total_register_users_result_user);
}

?>