
    <?php
    include "db_con.php";
    // include 'partials/header.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIM</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">


      <!-- favicon -->
      <link rel="shortcut icon" href="favicon.ico" />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="General_Assets/css/indexstyle.css">
    <?php
    include('General_Assets/link.php');
    ?>

    <style>
        
        .nav_icons {
            font-size: 80%;
        }

        .header {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            background-color: var(--white);
            z-index: 1000;
            box-shadow: var(--box-shadow);
        }

        .header a:hover,
        .header a:active {
            text-decoration: none;
        }

        .header .flex {
            margin: 0 auto;
            display: flex;
            align-items: center;
            max-width: 1200px;
            position: relative;
            justify-content: space-between;
            padding: 0.8rem 0;
        }

        .header .flex .logo {
            font-size: 2.5rem;
            color: var(--pink);
        }

        .header .flex .navbar {
            padding: 0;
        }

        .header .flex .navbar ul {
            list-style: none;
            margin: 0;
        }

        .header .flex .navbar ul li {
            float: left;
            position: relative;
        }

        .header .flex .navbar ul li a {
            font-size: 1.6rem;
            padding: 1rem 1.5rem;
            display: block;
            color: var(--light-color);
            text-transform: capitalize;
        }

        .header .flex .navbar ul li a:hover {
            background-color: var(--pink);
            color: var(--white);
        }

        .header .flex .navbar ul li ul {
            position: absolute;
            left: 0;
            width: 15rem;
            background-color: var(--white);
            animation: fadeIn .2s linear;
            display: none;
        }

        .header .flex .navbar ul li ul li {
            width: 100%;
        }

        .header .flex .navbar ul li:hover ul {
            display: inline-block;
        }

        .header .flex .icons>* {
            font-size: 2.5rem;
            margin-left: 1rem;
            color: var(--black);
            cursor: pointer;
        }

        .header .flex .icons>*:hover {
            color: var(--pink);
        }

        .header .flex .icons span {
            font-size: 2rem;
        }

        #menu-btn {
            display: none;
        }

        .header .flex .account-box {
            position: absolute;
            top: 120%;
            right: 2rem;
            background-color: var(--white);
            border: var(--border);
            text-align: center;
            box-shadow: var(--box-shadow);
            padding: 2rem;
            border-radius: .5rem;
            width: 33rem;
            display: none;
            animation: fadeIn .2s linear;
        }

        .header .flex .account-box.active {
            display: block;
        }

        .header .flex .account-box p {
            padding-bottom: 1rem;
            font-size: 2rem;
            color: var(--light-color);
            line-height: 1.5;
        }

        .header .flex .account-box p span {
            color: var(--pink);
        }

        .header .flex .account-box .delete-btn {
            margin-top: .5rem;
        }


        @media (max-width: 768px) {
            #menu-btn {
                display: inline-block;
            }

            .header .flex .navbar {
                position: absolute;
                top: 99%;
                left: 0;
                right: 0;
                background-color: var(--white);
                border-top: var(--border);
                border-bottom: var(--border);
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            .header .flex .navbar.active {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            .header .flex .navbar ul li {
                width: 100%;
                padding: 1rem;
            }

            .header .flex .navbar ul li ul {
                position: static;
                width: 100%;
                animation: none;
                background-color: var(--light-bg);
            }

            .header .flex .navbar ul li a {
                margin: 0;
                border: none;
                padding: 0;
            }

            .header .flex .navbar ul li ul li {
                padding-left: 2rem;
            }
        }
    </style>

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div class="flex">

            <a href="index.php" class="logo">DIM<span>.</span></a>

            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Tool/canvasSize.html">Create Design</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#review">Designer</a></li>
                    <li><a href="#">contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>

            <div class="icons " style="cursor:pointer" >
                 <a href="javascript:;"><i class="fas fa-bars nav_icons"></i></a>
                 <a href="javascript:;"><i class="fas fa-search nav_icons"></i></a>
                 <a href="javascript:;"><i class="fas fa-user nav_icons"></i></a>
                <a href="javascript:;"><i class="fas fa-heart nav_icons"></i></a>
                <a href="javascript:;"><i class="fas fa-shopping-cart nav_icons"></i></a>
            </div>

            <div class="account-box">
                <p>username : <span> user_name</span></p>
                <p>email : <span>user_email</span></p>
                <a href="logout.php" class="delete-btn">logout</a>
            </div>

        </div>

    </header>

    <!-- header section ends -->
    <!-- home section starts  -->

    <?php
    include 'partials/slider.php';
    ?>

    <!-- home section ends -->

    <!-- about section starts  -->



    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons shadow" >
            <img src="images/icon-1.png" alt="">
            <div class="info">
                <h3 class="font-weight-bold">free delivery</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons shadow" >
            <img src="images/icon-2.png" alt="">
            <div class="info">
                <h3 class="font-weight-bold">10 days returns</h3>
                <span>moneyback guarantee</span>
            </div>
        </div>

        <div class="icons shadow" >
            <img src="images/icon-3.png" alt="">
            <div class="info">
                <h3 class="font-weight-bold">offer & gifts</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons shadow" >
            <img src="images/icon-4.png" alt="">
            <div class="info">
                <h3 class="font-weight-bold">secure paymens</h3>
                <span>protected by paypal</span>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- prodcuts section starts  -->

    <section class="products" id="products">

        <h1 class="heading"> latest <span>products</span> </h1>

        <div class="box-container d-flex justify-content-center">
            <?php
            
            $sql = "SELECT * from products";
            $result = $con->query($sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = $result->fetch_object()) {
            ?>

                    <div class="card shadow" style="width: 25rem;">
                        <img class="card-img-top" src="<?php echo 'General_Assets/assets/img/Products/' . $row->pPic; ?>"  height="130px">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold"><?= $row->pName; ?></h4>
                            <p class="card-text "><?= $row->pDescription; ?></p>
                            <h5 class="font-weight-bold"><?= $row->pPrice; ?></h5>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

        </div>

    </section>

    <!-- prodcuts section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> <span>Designer</span> Designs </h1>

        <div class="box-container">
            <?php
          
            $sql = "SELECT * from designs";
            $result = $con->query($sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_object()) {
            ?>

                    <div class="box shadow">

                        <p><?= $row->description; ?></p>
                        <div class="user">
                            <img src="<?php echo 'General_Assets/assets/img/Designs/'. $row->dPic; ?>">
                            <div class="user-info">

                            
                                <span><?= $row->dCatagory; ?></span>
                                <h4>$<?= $row->dPrice; ?></h4>
                            </div>
                        </div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
            <?php }
            }
            ?>



        </div>

    </section>

    <!-- review section ends -->


    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">about</a>
                <a href="#">products</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#">my account</a>
                <a href="#">my order</a>
                <a href="#">my favorite</a>
            </div>

            <div class="box">
                <h3>locations</h3>
                <a href="#">Pakistan</a>


                <div class="box">
                    <h3>contact info</h3>
                    <a href="#">03466003800</a>
                    <a href="#">dim@gmail.com</a>
                    <a href="#">Gujranwala,Pakistan</a>
                    <img src="images/payment.png" alt="">
                </div>

            </div>

            <div class="credit"> created by <span> DIM Team </span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->



    <script src="js/script.js"></script>

</body>

</html>