<?php
session_start();
$error = "";
$account_error = "";
include "db_con.php";
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    // $role = mysqli_real_escape_string($con, $_POST['role']);

    // if ($role == '-1') {
    //     $error = "Please select a role";
    // }
    
    $role="";
    
    
    if ($role != '-1') {
        
        $query = "SELECT id,name,profile_img,email,password,user_status,role FROM `admin_users` WHERE email='$email' AND password='$password' ";
        
        $query_result = mysqli_query($con, $query);
        if (!empty($query) && (mysqli_num_rows($query_result) > 0)) {
            $result = mysqli_fetch_assoc($query_result);
            $role=$result['role'];
            
            if ($role == '2') {
                if( $result['user_status']=='block'){
                    $account_error="Your Account has been Blocked";
                }else if( $result['user_status']=='suspend'){
                    
                    $account_error="Your Account has been Suspended";
                }
                else{
                    $_SESSION['designer_user_name'] = $result['name'];
                    $_SESSION['designer_user_id'] = $result['id'];
                    $_SESSION['designer_user_pass'] = $result['password'];
                    $_SESSION['designer_profile_img'] = $result['profile_img'];
                    $_SESSION['designer_login'] = 'loged_in';
                    echo $result['user_status'];
                    echo $result['user_status'];
                    echo $result['user_status'];
                     header("location: designer/index.php");
                }
               
            }else if ($role == '3') {
                if( $result['user_status']=='block'){
                    $account_error="Your Account has been Blocked";
                }else if( $result['user_status']=='suspend'){
                    
                    $account_error="Your Account has been Suspended";
                }
                else{
                $_SESSION['vendor_user_name'] = $result['name'];
                $_SESSION['vendor_user_id'] = $result['id'];
                $_SESSION['vendor_user_pass'] = $result['password'];
                $_SESSION['vendor_profile_img'] = $result['profile_img'];
                $_SESSION['vendor_login'] = 'loged_in';
                 header("location: vendor/index.php"); }
            }else if ($role == '1') {
                if( $result['user_status']=='block'){
                    $account_error="Your Account has been Blocked";
                }else if( $result['user_status']=='suspend'){
                    
                    $account_error="Your Account has been Suspended";
                }
                else{
                $_SESSION['user_name'] = $result['name'];
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_pass'] = $result['password'];
                $_SESSION['profile_img'] = $result['profile_img'];
                $_SESSION['login'] = 'loged_in';
                 header("location: admin/index.php"); }
            }

            else if ($role == '0') {
                if( $result['user_status']=='block'){
                    $account_error="Your Account has been Blocked";
                }else if( $result['user_status']=='suspend'){
                    
                    $account_error="Your Account has been Suspended";
                }
                else{
              
                 header("location: index.php"); }
            }
            //  echo "<script>document.location.href='index.php';</script>";
            //
        } else {
            $error = "Invalid Username and Password.";
        }
    }
}

// include('partials/header.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico" />

    <?php

    include('General_Assets/link.php');
    ?>
    <style>
        .ftco-section {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url(images/login-bg.jpg) no-repeat;
            object-fit: cover;
            background-size: cover;
            z-index: 1;
        }

        .ftco-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }

        .login-wrp {
            max-width: 37%;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 1.5rem 2rem;
            box-shadow: 0 0 30px 10px rgb(0 0 0 / 50%);
        }

        @media screen and (max-width: 767px) {
            .login-wrp {
                max-width: 95%;
                margin: 20px auto;
            }
        }
    </style>
</head>

<body class="img js-fullheight" style="background-image: url(General_Assets/images/s3.jpg); background-size: cover;">
    <section class="ftco-section">
        <div class="container">
            
            <div class="login-wrp">
            <?php
                if ($error) {
                    echo '<div class="alert alert-danger alert-dismissible" style="position:absolute;z-index:9999">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> ' . $error . '
          </div>';
                }
                ?>
                <?php
                if ($account_error) {
                    echo '<div class="alert alert-danger alert-dismissible" style="position:absolute;z-index:9999">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Alert!</strong> ' . $account_error . '
          </div>';
                }
                ?>
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-3 text-center mb-3">
                        <h3 class="heading-section font-weight-bold">DIM</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12">
                        <div class="login-wrap p-0">
                            <h4 class="mb-4 text-center  text-capitalize">Login to your Account</h4>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter your email address" required name="user">
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" placeholder="Enter your password" required name="pass">
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <!-- <div class="form-group">
                                    <select id="role" class="form-control" required name="role">
                                        <option value="-1" selected>Select Role</option>
                                        <option value="0">Customer</option>
                                        <option value="2">Designer</option>
                                        <option value="3">Vendor</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div> -->

                                <div class="form-group d-md-flex">
                                    <!-- <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                          <input type="checkbox" checked>
                                          <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                                    <div class="w-100 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" name="login">LogIn</button>

                                </div>
                            </form>
                            <p class="w-100 text-center">&mdash; Or Create a <a href="signup.php" class="">new Account</a> &mdash;</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

</body>

</html>