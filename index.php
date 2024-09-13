<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>

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
session_start();


include('db_Connection.php');?>


<?php 

	$Home = "active";
	$Products = "";
	$styles = "";
	$about = "";
	$page = "";
	$contact = "";






// view login Message 
if(isset($_SESSION['LoginMsg'])){
	
	?>	
    
		<script> swal("<?php echo $_SESSION['LoginMsg'];?>", "Press Ok", "success");</script>
        
	<?php
		
	unset($_SESSION['LoginMsg']);
	
}


	
	if(isset($_POST['btnAdd'])){
		
		
		
		$id = $_POST['txtID'];
		
		$temp_image = $_FILES['productImage']['tmp_name'];
		$imageName = $_FILES['productImage']['name'];
	
		$ext = explode(".",$imageName);
		$extType = array("jpg","png","gif","jpeg");
		
		if(in_array($ext[1],$extType)){
			
			$image_base64 = base64_encode(file_get_contents($temp_image));
			$image = "data:image/;base64,".$image_base64;
			
			$Sql = "INSERT INTO home_slider VALUES('".$id."','".$image."')";
			
			
			if(mysqli_query($con,$Sql)){
				
				$msg = "<p>Slider Inserted!<p/>";
			}
			
			
		}else{
			
			echo "<p>Error : ". mysqli_error($con)."</p>";	
			
		}
		
		
		
		
	}




?>

<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
</div>


<!-- nav bar -->
<div style="padding-bottom:100px">
<?php include('Nav_Bar.php');?>
</div>



<!-- Start Slider -->

<div class="carousel slide" data-ride="carousel" id="carouseledemo" data-interval="5000">

<ol class="carousel-indicators">
	<li data-target="#carouseledemo" data-slide-to="0" class="active"></li>
    <li data-target="#carouseledemo" data-slide-to="1"></li>
	<li data-target="#carouseledemo" data-slide-to="2"></li>
	
</ol>
	<div class="carousel-inner">
    	
    
    	<div class="carousel-item active">
        <?php 
		
		$sql = "select * from home_slider where slider_id = 1 ";
		
		$result =mysqli_query($con,$sql);
		
		if($row= mysqli_fetch_row($result)){
		
		?>
        	<img src="<?php echo $row[1];?>" class="d-block w-100 img-fluid "/>
            
        <?php
		
			}
			
		?>
            
            <div class="carousel-caption d-none d-md-block row">
            	<div class="col">
            		
                </div>
          
              </div>
            
        </div>
        
       
        
    	<div class="carousel-item">
        
        <?php 
		
		$sql = "select * from home_slider where slider_id = 2 ";
		
		$result =mysqli_query($con,$sql);
		
		if($row= mysqli_fetch_row($result)){
		
		?>
        	<img src="<?php echo $row[1];?>" class="d-block w-100 img-fluid"/>
        <?php
		
			}
			
		?>   
            <div class="carousel-caption d-none d-md-block row m-auto" align="center">
            
            	<a href="CreateAccount.php"><button class="btn btn-danger" style="font-size:20px;font-weight:700; margin-bottom:40px; padding:
                20px 60px 20px 60px;">Join with Us</button></a>
            	
            </div>
            
        </div>
        
        <div class="carousel-item">
        <?php 
		
		$sql = "select * from home_slider where slider_id = 3 ";
		
		$result =mysqli_query($con,$sql);
		
		if($row= mysqli_fetch_row($result)){
		?>
        	<img src="<?php echo $row[1];?>" class="d-block w-100 img-fluid"/> 
            
        <?php
		
			}
			
		?>   
            
        	<div class="carousel-caption d-none d-md-block">
        		<a href="My_Reservation.php"><button class="btn btn-outline-dark" style="font-size:20px;font-weight:700;margin-left:55%; 
                padding:20px 60px 20px 60px; background-color:#ff646e; color:white">View</button></a>
                
            </div>
    
        </div>
    
    
    	<div class="slide-btn">
   			<a class="carousel-control-prev"role="button" data-slide="prev" href="#carouseledemo">
   				<span class=" carousel-control-prev-icon" aria-hidden="true"</span>
   				<span class="sr-only">Previous</span>
  			</a> 
   
   			<a class="carousel-control-next" role="button" data-slide="next" href="#carouseledemo">
  				<span class=" carousel-control-next-icon" aria-hidden="true"</span>
   				<span class="sr-only">Next</span>
   			</a> 
  	    </div>
       
	</div>
</div>
<!-- End Slider -->
<!-- Start Salon Gallery -->
<div class="container mt-5">
    <h2 class="text-center mb-5">Salon Divine Gallery</h2>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/gallery/image -01.png" class="card-img-top" alt="Salon Image 1">
                <div class="card-body">
                    <p class="card-text">Experience our luxurious services at Salon Divine.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/gallery/image-02.jpg" class="card-img-top" alt="Salon Image 2">
                <div class="card-body">
                    <p class="card-text">Top-notch facilities and professional service.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/gallery/image-03.jpg" class="card-img-top" alt="Salon Image 3">
                <div class="card-body">
                    <p class="card-text">Visit us to get a premium look!</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/gallery/image-04.jpg" class="card-img-top" alt="Salon Image 4">
                <div class="card-body">
                    <p class="card-text">A relaxing environment just for you.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/gallery/image-05.jpg" class="card-img-top" alt="Salon Image 5">
                <div class="card-body">
                    <p class="card-text">Transform your style at Salon Divine.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/gallery/image-06.jpg" class="card-img-top" alt="Salon Image 6">
                <div class="card-body">
                    <p class="card-text">Get pampered with our professional care.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Salon Gallery -->

<!-- Start Why Choose Us Section -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="img/why select.jpg" class="img-fluid" alt="Why Choose Us Image">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Why Choose Salon Divine?</h2>
            <p>
                At Salon Divine, we are committed to providing top-quality services that enhance your natural beauty. Our experienced staff ensures that each visit leaves you feeling refreshed, rejuvenated, and confident. We offer a wide variety of salon services ranging from haircuts, styling, coloring, to beauty treatments tailored to meet your needs.
            </p>
            <p>
                We prioritize customer satisfaction and strive to create a relaxing, enjoyable environment for every client. With state-of-the-art facilities, the latest trends, and personalized care, we ensure a luxurious experience each time.
            </p>
         
        </div>
    </div>

    <!-- Our Services Section -->
    <div class="row mt-5" style =  border: "15px solid black;">
        <div class="col text-center">
            <h3 class="mb-4">Our Services</h3>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Haircut & Styling</h5>
                    <p class="card-text">Get the perfect haircut or style that suits your personality.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Hair Coloring</h5>
                    <p class="card-text">Trendy hair colors to give you a fresh, vibrant look.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Facials & Skincare</h5>
                    <p class="card-text">Rejuvenate your skin with our expert facial and skincare treatments.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Nail Care</h5>
                    <p class="card-text">Pamper your hands and feet with our manicures and pedicures.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Makeup & Bridal Services</h5>
                    <p class="card-text">Look your best for special occasions with our professional makeup services.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Spa Treatments</h5>
                    <p class="card-text">Relax and unwind with our exclusive spa and body treatments.</p>
                </div>
            </div>
        </div>
    
    </div>
    <div class="text-center mt-5" style="padding-bottom:50px; align-item:center">
                <a href="CreateAccount.php"><button class=" btn btn-info btn-lg" style=" font-weight:bold; width:50%"; border-radius: "50px";>Join Us</button></a>
            </div>
	
</div>
<!-- End Why Choose Us Section -->







<!-- Footer Section Begin -->
<?php include('Footer.php');?>
<!-- Footer Section End -->




<script src="js/jquery-3.3.1.min.js"></script> 
<script src="js/main.js"></script>
</body>
</html>