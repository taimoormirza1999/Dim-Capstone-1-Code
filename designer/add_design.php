<?php



include('../db_con.php');
include('partials/header.php');

$msg = "";
if (isset($_POST['add_design'])) {

    $dname = $_POST['dName'];
    $dcat = $_POST['dCatagory'];
    $ddescription = $_POST['desc'];
    $dprice = $_POST['price'];


 

    $c_img_name = $_FILES['picture']['name'];
    $c_img_size = $_FILES['picture']['size'];
    $c_img_type = pathinfo($c_img_name, PATHINFO_EXTENSION);
    $c_img_tmp_name = $_FILES['picture']['tmp_name'];
    $res = false;
    $path = "../General_Assets/assets/img/Designs/" . $c_img_name;
    
        // add new one
        $move_file = move_uploaded_file($c_img_tmp_name, $path);
    $userid=$_SESSION['designer_user_id'];
    $query = "INSERT INTO `designs`(`dName`, `dCatagory`,`dPrice`, `dPic`, `description`, `user_id`) VALUES ('$dname','$dcat','$dprice','$c_img_name','$ddescription',$userid)";

    $query_result_add_design = mysqli_query($con, $query);
    if ($query_result_add_design) {
        $msg = "Design Added Successfully";
    }
    
}

?>
<!-- start page container -->
<div class="page-container">
    <?php
    include('partials/sidebar.php');
    ?>

    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content ">
            <div class="card-head">
                <header>Add Design</header>
            </div>
            <?php if ($msg) { ?>
                <div class="col-3 mx-md-3 alert alert-success timeout">
                    <strong>Success!</strong> <?php echo $msg; ?>
                </div>
            <?php } ?>

            <div class="outer-profile medium_b_raius mx-md-5" style="background:rgba(0,0,0,0.3);padding:1%;">
                <div class=" deep_dark p-md-5 p-3 text-light text-monospace px-md-5">
                    <form method="post" enctype="multipart/form-data">
                        <h3>Add Design Information</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="">Design Name</label>
                                    <input required type="text" placeholder="Design Name" name="dName" class="form-control" id="dName">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="">Add Design Category</label>
                                    <input required type="text" placeholder="Design Catagory" name="dCatagory" class="form-control" id="catagory">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 col-md-6 mt-3">
                                    <label class="">Upload Design Picture</label>
                                    <input required type="file" class="form-control mb-3" id="picture" name="picture" style="width: 70%;">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label class="">Design Price</label>
                                    <input required type="number" placeholder="Design Pre-Price" name="price" class="form-control" id="price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3">
                                <label class="">Design Description</label>
                                    <textarea class="form-control" placeholder="Enter Design Description " id="floatingTextarea2" name="desc" style="height: 100px"></textarea>
                                </div>
                               
                            </div>
                            <button type="submit" class="btn btn-secondary mt-3" name="add_design">Add Design</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- end page content -->

<!-- end chat sidebar -->
</div>
<!-- end page container -->
<?php
include('partials/footer.php');

?>