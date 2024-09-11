<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

<?php 


	$Home = "";
	$Products = "";
	$styles = "";
	$about = "";
	$page = "";
	$contact = "active";




?>






<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
</div>

<div style="padding-bottom:100px">
<?php include('Nav_Bar.php');?>
</div>


 <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container pb-5" style="border-bottom:solid 1px #CCC"> 
            <div class="row pt-5">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>No 45,  Boralasgamuwa, Sri Lanka</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>011-2048729</span><span>071-8847871</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>Support.salondivne@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                     
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                    <iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" 
                    src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=45,boralesgamuwa%20pasiyafb+(Salon%20Divine)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                	</div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->



<!-- Footer Section Begin -->
<?php include('Footer.php');?>
<!-- Footer Section End -->








<script src="js/jquery-3.3.1.min.js"></script> 
<script src="js/main.js"></script>

</body>
</html>