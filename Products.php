<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    /* Button Styling */
    .productBtn, .btnAddToCart {
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        background-color: #343a40;
        color: white;
        margin-right: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .productBtn:hover, .btnAddToCart:hover {
        background-color: #dc3545;
        transform: scale(1.1);
    }

    /* Product Item Card */
    .product_item {
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }

    .product_item:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .prd_item_img img {
        border-radius: 15px 15px 0 0;
        transition: all 0.3s ease;
    }

    .prd_item_img img:hover {
        transform: scale(1.1);
    }

    .product_item-text {
        padding: 15px;
        text-align: center;
    }

    .modal-content {
        border-radius: 15px;
    }

    /* Loader */
    #preloder {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        z-index: 9999;
    }

    .loader {
        width: 40px;
        height: 40px;
        border: 4px solid #007bff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s linear infinite;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -20px;
        margin-left: -20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

</head>

<body>

<?php 
session_start();

include('db_Connection.php');
include('Cart.php');

$Home = "";
$Products = "active";
$styles = "";
$about = "";
$page = "";
$contact = "";


$all ="active";
$hair = "";
$skin = "";
$makeup = "";
$tools = "";

$sql ="SELECT * FROM products";

if(isset($_POST['btnAll'])){
    $all ="active";
    $hair = "";
    $skin = "";
    $makeup = "";
    $tools = "";
}

if(isset($_POST['btnHair'])){
    $all ="";
    $hair = "active";
    $skin = "";
    $makeup = "";
    $tools = "";
    $sql ="SELECT * FROM products where category = 'Hair'";
}

if(isset($_POST['btnSkinCare'])){
    $all ="";
    $hair = "";
    $skin = "active";
    $makeup = "";
    $tools = "";
    $sql ="SELECT * FROM products where category = 'SkinCare'";
}

if(isset($_POST['btnMakeUp'])){
    $all ="";
    $hair = "";
    $skin = "";
    $makeup = "active";
    $tools = "";
    $sql ="SELECT * FROM products where category = 'Makeup'";
}

if(isset($_POST['btnTools'])){
    $all ="";
    $hair = "";
    $skin = "";
    $makeup = "";
    $tools = "active";
    $sql ="SELECT * FROM products where category = 'Tool'";
}
?>

<!-- Page Preloader -->
<div id="preloder">
    <div class="loader"></div>
</div>

<div style="padding-bottom:100px">
    <?php include('Nav_Bar.php');?>
</div>

<div class="container pb-5 mb-5" style="border-bottom:solid 1px #CCC">
    <div class="row m-auto">
        <div class="col-lg-12 mt-5">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <button class="productBtn <?php echo $all; ?>"  name="btnAll">All</button>
                <button class="productBtn <?php echo $hair; ?>"  name="btnHair" >Hair</button>
                <button class="productBtn <?php echo $skin; ?>"  name="btnSkinCare" >Skin Care</button>
                <button class="productBtn <?php echo $makeup; ?>"  name="btnMakeUp" >Makeup</button>
                <button class="productBtn <?php echo $tools; ?>"  name="btnTools" >Tools</button>
            </form>    
        </div>
        <div class="col-lg-12 mt-3 mb-3">
            <div style="border-bottom:solid #CCC 1px;"></div>
        </div>
    </div>

    <div class="row m-auto">
    <?php
    $result =mysqli_query($con,$sql);
    while($row= mysqli_fetch_row($result)){
    ?>
        <div class="col-lg-3 col-md-6">
            <div class="product_item">
                <div class="prd_item_img">
                    <img src="<?php echo $row[3]; ?>" class="img-fluid" alt="Image" data-toggle="modal" data-target="#<?php echo $row[0];?>">
                </div>
                <div class="product_item-text"> 
                    <div style="height:55px;">
                        <h5><?php echo $row[1]; ?><input type="hidden" name="productName" value="<?php echo $row[1]; ?>"/></h5>
                    </div>
                    <span <?php if($row[7]=="Sold Out"){?> style="display:none;"  <?php }?>>
                        <h6 <?php if(!empty($row[6])){?> style="color:#060;" <?php } ?> >
                            Rs.<?php echo $row[2]; ?>.0 &nbsp; <del style="color:#666;font-weight:500; font-size:15px"><?php if(!empty($row[6])){ ?>Rs.<?php echo $row[6];?>.0<?php } ?></del>
                        </h6>
                    </span>
                    <div <?php if($row[7]=="Sold Out"){?> style="display:block;background:#900; color:#FFF; border-radius:10px; height:30px;padding-top:3px; font-weight:600"<?php }?> style="display:none;">
                        Sold Out
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="<?php echo $row[0];?>" role="dialog">
            <div class="modal-dialog modal-lg">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $row[0];?>" method="post">
                    <div class="modal-content" style="background-color:#f5f5f5; border-radius:10px">
                        <div class="modal-header">
                            <h5 class="modal-title" style="padding-left:15px;"><?php echo $row[1]; ?><input type="hidden" name="productName" value="<?php echo $row[1]; ?>"/></h5>
                            <button type="button" class="close close_btn" data-dismiss="modal" aria-label="Close" style="outline:none;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="border-bottom:solid #603 25px; border-radius:9px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 mb-1">
                                        <img src="<?php echo $row[3]; ?>" class="img-fluid" alt="Image" style="-webkit-box-shadow: 0px 5px 8px #333333;">
                                        <p class="item__corde mt-3">Item Corde : <?php echo $row[0];?></p>
                                        <input type="hidden" name="productIMG" value="<?php echo $row[3]; ?>"/>
                                    </div>
                                    <div class="product__details col-lg-6" style="text-align:center">
                                        <h6>Description</h6>
                                        <p class="mb-5 mt-2"><?php echo $row[5]; ?></p>
                                        <h5 <?php if(!empty($row[6])){?> style="color:#060;" <?php } ?> >
                                            Rs.<?php echo $row[2]; ?>.0 &nbsp; 
                                            <del><?php if(!empty($row[6])){ ?>Rs.<?php echo $row[6];?>.0<?php } ?></del>
                                            <input type="hidden" name="productPrice" value="<?php echo $row[2]; ?>"/>
                                        </h5>
                                        <span <?php if($row[7]=="Sold Out"){?> style="display:none;"  <?php }?>>
                                            <div class="mt-5">
                                                <label>Set qty</label>
                                                <input type="number" name="txtQty" max="9" min="1" value="1"/>
                                                <button type="submit" name="btnAddToCart" class="btnAddToCart ml-4">ADD TO CART</button>
                                            </div>
                                        </span>
                                        <div <?php if($row[7]=="Sold Out"){?> style="display:block;background:#900; color:#FFF; border-radius:10px;height:100px;padding-top:20px; font-weight:600; font-size:36px"<?php }?> style="display:none;">
                                            Sold Out
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    <?php 
    } 
    ?> 
    </div>
</div>

<!-- Footer Section Begin -->
<?php include('Footer.php');?>
<!-- Footer Section End -->

<script src="js/jquery-3.3.1.min.js"></script> 
<script src="js/main.js"></script>

</body>
</html>
