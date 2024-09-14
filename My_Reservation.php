<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Reservation</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    /* Button Styling */
    .revBtn, .sevBtn, .btn-outline-info {
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .revBtn:hover, .sevBtn:hover, .btn-outline-info:hover {
        background-color: #dc3545;
        color: #fff;
        transform: scale(1.05);
    }

    /* Table Styling */
    table.table {
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 15px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
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

    /* Alert Styling */
    .alert-box {
        background-color: #f8d7da;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
    }
</style>

</head>

<body>
<?php 
session_start();

include('db_Connection.php');
include('Booking_Operation.php');

$Home = "";
$Products = "";
$styles = "";
$about = "";
$page = "active";
$contact = "";

$booking = "active";
$veiwBooking = "";

$hair = "active";
$waxing = "";
$bleaching="";
$facials="";


$SQL = "SELECT * FROM services where category = 'Hair'";

if(isset($_POST['btnBooking'])){
    $booking = "active";
    $veiwBooking = "";
}

if(isset($_POST['btnViewBooking'])){
    $booking = "";
    $veiwBooking = "active";
}

if(isset($_POST['btnHair'])){
    $hair ="active";
    $waxing = "";
    $bleaching="";
    $facials="";
    $SQL = $SQL;
}

if(isset($_POST['btnWaxing'])){
    $hair ="";
    $waxing = "active";
    $bleaching="";
    $facials="";
    $SQL = "SELECT * FROM services where category = 'Waxing'";
}

if(isset($_POST['btnbleaching'])){
    $hair ="";
    $waxing = "";
    $bleaching="active";
    $facials="";
    $SQL = "SELECT * FROM services where category = 'Bleaching'";
}

if(isset($_POST['btnfacials'])){
    $hair ="";
    $waxing = "";
    $bleaching="";
    $facials="active";
    $SQL = "SELECT * FROM services where category = 'Facials'";
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

    <div class="row mb-3 text-center">
        <div class="col-lg-12 mt-5">
            <table class="table table-light">
                <tr>
                    <td><h3>My Reservation</h3></td>
                    <td align="right" <?php if(isset($_POST['btnViewBooking'])){ ?> style="display:none"<?php }else{?> style="display:block" <?php } ?>>
                        <button style="border:none; background:#FFF; outline:none;" data-toggle="modal" data-target="#myBookingList">
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            <?php if (isset($_SESSION['booking_items'])) {?><span style="background:#C03; padding:3px 10px 5px 10px; border-radius:50%; color:#FFF;"><?php echo $_SESSION['booking_items'];?></span><?php } ?>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row m-auto">
        <div class="col-lg-12 text-center">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <button class="revBtn <?php echo $booking; ?>"  name="btnBooking">Booking</button>
                <button class="revBtn <?php echo $veiwBooking; ?>"  name="btnViewBooking">View My Bookings</button>
            </form>
        </div>

        <div class="col-lg-12 mt-3 mb-3">
            <div style="border-bottom:solid #CCC 1px;"></div>
        </div>
    </div>

    <div class="row" <?php if(isset($_POST['btnViewBooking'])){ ?> style="display:none"<?php }else{?> style="display:block" <?php } ?>>
        <div class="col-lg-12 mt-2 mb-3 pb-3 pt-2 text-center">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="sevBtn_group">
                <button class="sevBtn <?php echo $hair; ?>" name="btnHair">Hair</button>
                <button class="sevBtn <?php echo $waxing; ?>" name="btnWaxing">Waxing</button>
                <button class="sevBtn <?php echo $bleaching; ?>" name="btnbleaching">Bleaching</button>
                <button class="sevBtn <?php echo $facials; ?>" name="btnfacials">Facials</button>
            </form>
        </div>

        <div class="col-lg-12 mt-0">
            <table class="table table-hover table-active" style="background:#f5f5f5; text-align:left;">
                <?php 
                $result =mysqli_query($con,$SQL);
                while($row= mysqli_fetch_row($result)){
                ?> 
                <tr style="font-weight:600; font-size:20px; color:#333;">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $row[0];?>" method="post">
                    <td><?php echo $row[1];?><input type="hidden" name="service_name" value="<?php echo $row[1]; ?>"/></td>
                    <td style="text-align:right">Rs.<?php echo $row[3];?>.0<input type="hidden" name="service_price" value="<?php echo $row[3]; ?>"/></td>
                    <td style="text-align:center">
                        <button class="btn btn-outline-info" style="font-weight:600" name="AddToBooking">Add To Booking</button>
                    </td>
                </form>
                </tr>
                <?php 
                }
                ?>
            </table>
        </div>
    </div>

    <div class="row" <?php 
    if(isset($_POST['btnViewBooking'])){ ?> style="display:block"<?php }else{?> style="display:none" <?php } ?>>
    <?php
    if(isset($_SESSION['booking_details'])){
    ?>
    <table class="table table-active" style="background:#f5f5f5;-webkit-box-shadow: 0px 5px 8px #333333;">
        <tr style="background:#C03; color:#FFF;">
            <th>Booking Corde</th>
            <th>Date</th>
            <th>Time</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php 
        foreach($_SESSION['booking_details'] as $key => $value){
        ?>
        <tr style="color:#333; font-size:14px; font-weight:500">
            <td><?php echo $value['b_id']; ?></td>
            <td><?php echo $value['date']; ?></td>
            <td><?php echo $value['time']; ?></td>
            <td>Rs.<?php echo $value['total']; ?>.0</td>
            <td><?php echo $value['booking_status']; ?></td>
            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#<?php echo $value['b_id'];?>">More</button></td>
        </tr>

        <!-- Modal -->
        <tr>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="<?php echo $value['b_id'];?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background:#C03 ;color:#FFF;">
                        <h5 class="modal-title" style="padding-left:15px;"> Booking Corde : <?php echo $value['b_id']; ?></h5>
                        <button type="button" class="close close_btn" data-dismiss="modal" aria-label="Close" style="outline:none;color:#FFF">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background:#f5f5f5">
                        <div class="container">
                            <div class="row m-auto pb-2" style="border-bottom:#CCC solid 1px" align="center">
                                <div class="col col-lg-4 m-auto"> <h5>Service Corde</h5></div>
                                <div class="col col-lg-4 m-auto"><h5>Services</h5></div>
                                <div class="col col-lg-4 m-auto"><h5>Price</h5></div>
                            </div>
                            <?php
                            $Sql = "SELECT * FROM booking_details where b_id='".$value['b_id']."'";
                            $result =mysqli_query($con,$Sql);
                            while($row= mysqli_fetch_row($result)){
                            ?>
                            <div class="row m-auto pt-3 pb-3" style="border-bottom:#CCC solid 1px" align="center">
                                <div class="col col-lg-4 m-auto"><h6><?php echo $row['2'];?></h6></div>
                                <div class="col col-lg-4 m-auto"><h6><?php echo $row['3'];?></h6></div>
                                <div class="col col-lg-4 m-auto"><h6>Rs.<?php echo $row['4'];?>.0</h6></div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="row m-auto" align="center" style="background-color:#333; color:#FFF">
                                <div class="col col-lg-4 mt-3 mb-3"><h3>Total</h3></div>
                                <div class="col col-lg-4 mt-3 mb-3"></div>
                                <div class="col col-lg-4 mt-3 mb-3"><h3>Rs.<?php echo $value['total'];?>.0</h3></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
    } else {
    ?>
    <div class="col-lg-12 mt-3 mb-3 text-center">
        <div class="alert-box">
            <svg cowidth="6em" height="6em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
            <h2 class="pt-5" style="text-transform:lowercase; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#333; font-weight:600">
                No Bookings are In
            </h2>
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
