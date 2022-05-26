<?php



include('../db_con.php');
include('partials/header.php');

$msg = "";
if (isset($_POST['add_product'])) {

    $dname = $_POST['dName'];
    $dcat = $_POST['dCatagory'];
    $ddescription = $_POST['desc'];
    $dprice = $_POST['price'];
;

 

    $c_img_name = $_FILES['picture']['name'];
    $c_img_size = $_FILES['picture']['size'];
    $c_img_type = pathinfo($c_img_name, PATHINFO_EXTENSION);
    $c_img_tmp_name = $_FILES['picture']['tmp_name'];
    $res = false;
    $path = "../General_Assets/assets/img/Products/" . $c_img_name;
    
        // add new one
        $move_file = move_uploaded_file($c_img_tmp_name, $path);
    $userid=$_SESSION['vendor_user_id'];
    $query = "INSERT INTO `products`( `pName`, `pPrice`, `pPic`, `pDescription`, `product_category`, `user_id`) VALUES ('$dname','$dprice','$c_img_name','$ddescription','$dcat',$userid)";

    $query_result_add_product = mysqli_query($con, $query);
    if ($query_result_add_product) {
        $msg = "Product Added Successfully";
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
                <header>Add Product</header>
            </div>
            <?php if ($msg) { ?>
                <div class="col-3 mx-md-3 alert alert-success timeout">
                    <strong>Success!</strong> <?php echo $msg; ?>
                </div>
            <?php } ?>

            <div class="outer-profile medium_b_raius mx-md-5" style="background:rgba(0,0,0,0.3);padding:1%;">
                <div class=" vendor_primary p-md-5 p-3 text-light text-monospace px-md-5">
                    <form method="post" enctype="multipart/form-data">
                        <h3>Add Product Information</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="">Product Name</label>
                                    <input required type="text" placeholder="Product Name" name="dName" class="form-control" id="dName">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="">Add Product Category</label>
                                    <input required type="text" placeholder="Product Catagory" name="dCatagory" class="form-control" id="catagory">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 col-md-6 mt-3">
                                    <label class="">Upload Product Picture</label>
                                    <input required type="file" class="form-control mb-3" id="picture" name="picture" style="width: 70%;">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label class="">Product Price</label>
                                    <input required type="number" placeholder="Product Pre-Price" name="price" class="form-control" id="price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3">
                                <label class="">Product Description</label>
                                    <textarea class="form-control" placeholder="Enter Product Description " id="floatingTextarea2" name="desc" style="height: 100px"></textarea>
                                </div>
                               
                            </div>
                            <button type="submit" class="btn btn-secondary mt-3" name="add_product">Add Product</button>
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