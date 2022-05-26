<?php
session_start();
include "db_con.php";
// include "partials/header.php";

$error = "";
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = (int)$_POST['role'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $cPass = $_POST['re_password'];
    if (strlen($name)>20) {
        $error = "Name length must be between 1 and 20 characters";
        // die;
    }
    if (strlen($phone)>=11) {
        $error = "Phone length must be between 1 and 11 characters";
    }
    $emailQuery = "SELECT * FROM admin_users where email='$email' or phone='$phone'";
    $result = mysqli_query($con, $emailQuery);

    if (mysqli_num_rows($result) > 0) {
        $error = "User already Exist";
    } else {
        if ($pass === $cPass) {
            $insert = "INSERT INTO `admin_users`( `name`, `email`, `password`, `role`, `gender`, `phone`, `address`,`profile_img`,`suspended_date`) VALUES ('$name', '$email', '$pass',$role,'$gender' , '$phone' , '$address','default.png','')";
            $sql = mysqli_query($con, $insert);
            if ($sql) {
                // echo "SUCCESS";
                header('location:login.php');
            } else {
                // echo $insert;
                $error = "OOPS ERROR ...!";
                //  echo  "<script>alert('OOPS ERROR ...!')</script>";
            }
        } else {
            $error = "password and confirm password are not same";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DIM-Sign Up</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" />
    <?php
    include('General_Assets/link.php');
    ?>

    <!-- Main css -->
    <style type="text/css">
        body {
            background-image: url(General_Assets/images/t.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            margin-top: 40px;
        }

        .marq {
            margin-left: 35%;
            margin-right: 35%;
            color: #ffffff;
        }

        .left-div {
            background: url('General_Assets/images/t2.jpg');
            background-position: center;
            background-size: cover;
            opacity: 0.9;
            height: 490px;
            width: 320px;
            margin-left: 20%;
            float: left;
            border-radius: 50px 3px 0px 50px;

        }

        .right-div {
            background-color: rgba(255, 255, 255, 0.7);
            display: inline-block;
            height: 490px;
            width: 400px;
            padding: 1%;
            border-radius: 0px 50px 50px 0px;
        }

        label {
            color: white;
            font-family: Calibri;
            font-size: 100%;
        }

        img {
            padding-top: 20px;
            border-radius: 10%;
        }

        .adr {
            padding: 30px;
        }

        .gndr {
            color: #31a5f3;
        }

        .right-div input[type=text],
        input[type=password],
        input[type=email],
        input[type=date] {
            width: 100%;
            padding: 5px 0px 0 0;
            margin: 8px 0;
            border: none;
            border-bottom: 2px solid #000000;
            background-color: transparent;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 8px 20px;
            margin: 8px 0;
            border: none;
            border-bottom: 2px solid #47a6e7;
            background-color: transparent;
            box-sizing: border-box;

        }

        option {
            background-color: rgba(43, 125, 213, 0.53);
        }

        .button {
            background-color: #18aad7;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 33px;
        }

        @media (max-width:760px) {

            .left-div,
            marquee {
                display: none;
            }

            .right-div {
                border-radius: 0;
                width: 100%;
                height: 100%;
                margin-bottom: 20%;
            }
        }
    </style>
</head>

<body>

    <div class="marq mt-5">
        <marquee onmouseover="this.stop()" onmouseout="this.start()">
            <h3>Welcome to Digital Ink Market</3>
        </marquee>
    </div>
    <div class="container ">

        <div class="left-div shadow-lg">
        <?php
        if($error){
            echo '<div class="alert alert-danger alert-dismissible" style="position:absolute">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> '.$error.'
          </div>';
        }
        ?>
            <div class="adr" style="color: white;">
                <!-- <img src="General_Assets/images/t2.jpg" height="100%" width="100%"> -->
                <!-- <h2>DIM</h2> -->
                <!-- <h6 style="background-color: rgba(112,236,113,0.78)">You get 50% discount by Signup</h6>
                <h5>Service options: Dine-in · Drive-through · No-contact delivery
                <address>Address: Kuwait Centre Main Bus Stop,<br>
                Qila Didar Singh Bypass,<br>
                Qila Didar Singh, 52330<br>
                Hours:<br>
                Open 24 hours<br></address>
                Phone: (055) 4710800<br></h5> -->
            </div>
        </div>

        <div class="right-div shadow-lg">

       
            <div class="main mx-auto">

                <section class="signup">
                    <!-- <img src="images/signup-bg.jpg" alt=""> -->
                    <div class="container">
                        <div class="signup-content ">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="signup-form" class="signup-form">
                                <h2 class="form-title">Create account</h2>
                                <div class="row form-group">
                                    <div class="col-md-6 col-12">
                                        <input required type="text" class="form-control" name="name" id="name" placeholder="Your Name" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input required type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6 col-12">
                                        <select name="role" class="form-select form-control">
                                            <option selected disabled>Select Role</option>
                                            <option value="0">Buyer</option>
                                            <option value="2">Designer</option>
                                            <option value="3">Vendor</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input required type="text" class="form-control" name="address" id="address" placeholder="Your Address" />
                                    </div>
                                </div>

                                <div class="row form-group ">
                                    <div class="col-5 col-md-3 ml-3">
                                        <input required class="form-check-input" type="radio" name="gender" id="male" value="option1">
                                        <label class="form-check-label" style="color: black" for="gender">Male</label>
                                    </div>
                                    <div class="col-6  col-md-3">
                                        <input required class="form-check-input" type="radio" name="gender" id="femle" value="option2">
                                        <label class="form-check-label" style="color: black" for="female">Female</label>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <input required type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" maxlength="11"/>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col">
                                        <input required type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                    </div>
                                    <div class="col">
                                        <input required type="password" class="form-control" name="re_password" id="re_password" placeholder="Confirm Password" />
                                    </div>
                                </div>

                                <div class="form-group form-group">
                                    <input required type="submit" name="submit" id="submit" class="btn btn-secondary" value="Sign up" />
                                </div>
                            </form>
                            <p class="loginhere">
                                Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                            </p>
                        </div>
                    </div>
            </div>
            </section>

        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>