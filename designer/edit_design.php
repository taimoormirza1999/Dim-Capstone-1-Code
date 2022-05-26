<?php



include('../db_con.php');
include('partials/header.php');

$d_id = "";
$dname_e = "";
$dcat_e = "";
$ddescription_e = "";
$dprice_e = "";
$msg = "";
if (isset($_GET['id'])) {
    $design_id = $_GET['id'];
    // Get Design Details
    $query = "SELECT * FROM `designs` WHERE id=" . $design_id;

    $query_result_view_design = mysqli_query($con, $query);

    $fetch_design = mysqli_fetch_assoc($query_result_view_design);
    $d_id = $fetch_design['id'];
    $dname_e = $fetch_design['dName'];
    $dcat_e = $fetch_design['dCatagory'];
    $ddescription_e = $fetch_design['description'];
    $dprice_e = $fetch_design['dPrice'];
    $dpicture_e = $fetch_design['dPic'];
}
if (isset($_POST['update_design']) && isset($_GET['id'])) {

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

    if (!$c_img_name) {
        $c_img_name = $dpicture_e;
    } else {
        // add new one
        $move_file = move_uploaded_file($c_img_tmp_name, $path);
        $userid = $_SESSION['designer_user_id'];
        $query = "UPDATE `designs` SET `dName`='$dname',`dCatagory`='$dcat',`dPrice`='$dprice',`dPic`='$c_img_name',`description`='$ddescription' WHERE id=" . $d_id;

        // Delete privious
        $prev_pict = $path . $dpicture_e;
        unset($prev_pict);
    }

    $query_result_add_design = mysqli_query($con, $query);
    if ($query_result_add_design) {
        // $msg = "";
        // header('location:view_designs.php');
        echo "<script>document.location.href='view_designs.php'</script>";
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
                <header>Update Design</header>
            </div>
            <?php if ($msg) { ?>
                <div class="col-3 mx-md-3 alert alert-success timeout">
                    <strong>Success!</strong> <?php echo $msg; ?>
                </div>
            <?php } ?>

            <div class="outer-profile medium_b_raius mx-md-5" style="background:rgba(0,0,0,0.3);padding:1%;">
                <div class=" deep_dark p-md-5 p-3 text-light text-monospace px-md-5">
                    <form method="post" enctype="multipart/form-data">
                        <h3>Update Design Information</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="">Design Name</label>
                                    <input required type="text" placeholder="Design Name" name="dName" value="<?php echo $dname_e; ?>" class="form-control" id="dName">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="">Update Design Category</label>
                                    <input required type="text" placeholder="Design Catagory" name="dCatagory" value="<?php echo $dcat_e; ?>" class="form-control" id="catagory">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 col-md-6 mt-3">
                                    <label class="">Upload Design Picture</label>
                                    <input type="file" class="form-control mb-3" id="picture" name="picture"  style="width: 70%;">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label class="">Design Price</label>
                                    <input required type="number" placeholder="Design Pre-Price" name="price" value="<?php echo $dprice_e; ?>" class="form-control" id="price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mt-5">
                                    <img class="shadow-lg" style="height: 110px;
    border-radius: 3%;
    width: 80%;
}" src="../General_Assets/assets/img/Designs/<?php echo $dpicture_e; ?>" class="img-responsive img fluid" alt="">
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="">Design Description</label>
                                    <textarea class="form-control" placeholder="Enter Design Description " id="floatingTextarea2" name="desc" style="height: 100px">
                                    <?php echo $ddescription_e; ?></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-secondary mt-3" name="update_design">Update Design</button>
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