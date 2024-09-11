<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Style</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

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

include('db_Connection.php');

// all the booking operations 
include('Booking_Operation.php');

$Home = "";
$Products = "";
$styles = "active";
$about = "";
$page = "";
$contact = "";

	$all 	 ="active";
	$Casual  = "";
	$Parties = "";
	$Event   = "";
	
	
	$sql ="SELECT * FROM styles";

if(isset($_POST['btnAll'])){
	
	$all     ="active";
	$Casual  = "";
	$Parties = "";
	$Event   = "";
	
	
	$sql = $sql;
	
}

if(isset($_POST['btnCasual'])){
	
	$all     = "";
	$Casual  = "active";
	$Parties = "";
	$Event   = "";
	
	$sql ="SELECT * FROM styles where category = 'Casual'";
	
}

if(isset($_POST['btnParties'])){
	
	$all     = "";
	$Casual  = "";
	$Parties = "active";
	$Event   = "";
	
	$sql ="SELECT * FROM styles where category = 'Parties'";
	
}

if(isset($_POST['btnEvent'])){
	
	$all     = "";
	$Casual  = "";
	$Parties = "";
	$Event   = "active";
	
	$sql ="SELECT * FROM styles where category = 'Formal Events'";
	
}




?>



<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
</div>



<div style="padding-bottom:100px">
<?php include('Nav_Bar.php');?>
</div>

<div class="container pb-5 mb-5" style="border-bottom:solid 1px #CCC">

	<div class="row m-auto">
    
    	
    		<div class="col col-lg-12 mt-5">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 		 		<button class="stylesBtn <?php echo $all; ?>"  name="btnAll">All</button>
  				<button class="stylesBtn <?php echo $Casual; ?>"  name="btnCasual" >Casual</button>
  				<button class="stylesBtn <?php echo $Parties; ?>"  name="btnParties" >Parties</button>
  				<button class="stylesBtn <?php echo $Event; ?>"  name="btnEvent" >Formal Events</button>
                
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
   			
   		<div class="col-lg-4 col-md-6 ">
          		
        	<div class="style_item">
                		
                <div class="style_item_img">
					<img src="<?php echo $row[3]; ?>" class="img-fluid" alt="Image" data-toggle="modal" 
                    data-target="#<?php echo $row[0];?>">
                </div>
                        
				<div class="style_item-text"> 
                  	<div style="height:55px;">
						<h5><?php echo $row[1]; ?></h5>
                </div>
                            
				<h6>Rs.<?php echo $row[2]; ?>.0 &nbsp;</h6>
                            
			</div>
                
		</div>
                
  	</div>   
                
 	<div class="modal fade bd-example-modal-lg" id="<?php echo $row[0];?>" role="dialog">
 		 <div class="modal-dialog modal-lg">
  
    		<div class="modal-content" style="background-color:#f5f5f5; border-radius:10px">
      			<div class="modal-header">
        				<h5 class="modal-title" style="padding-left:15px;"><?php echo $row[1]; ?></h5>
        				<button type="button" class="close close_btn" data-dismiss="modal" aria-label="Close" style="outline:none;">
          				<span aria-hidden="true">&times;</span>
        				</button>
      			</div>
     			<div class="modal-body" style="border-bottom:solid #603 25px; border-radius:9px;">
     	
        			<div class="container">
                    
        				<div class="row">
             
            				<div class="col-lg-6 mb-1">
                				<form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $row[0];?>" method="post">
                					<img src="<?php echo $row[3]; ?>" class="img-fluid" alt="Image"/ 
                                    style="-webkit-box-shadow: 0px 5px 8px #333333;">
                					<p class="stlye__corde mt-3">Style Corde : <?php echo $row[0];?></p>
                    				<input type="hidden" name="styleCorde" value="<?php echo $row[0]; ?>"/>
                   					 <input type="hidden" name="styleName" value="<?php echo $row[1]; ?>"/>
                    
                			</div>
                
                			<div class="style__details col-lg-6" style="text-align:center">
                				<h6 style=""> Description</h6>
                    			<p class="mb-3 mt-2" style=""><?php echo $row[5]; ?></p>
                    
                    			<h5>Rs.<?php echo $row[2]; ?>.0<input type="hidden" name="stylePrice" value="<?php echo $row[2]; ?>"/></h5>
                    
                    			<div class="mt-3">
                    				<h6 class="mb-3">Possible Style Ideas</h6>
                        
                        			<P style="border-bottom:none; margin:auto"><span style="font-weight:600;color:#000">
                                    Suitable Hair Types : </span><?php echo $row[6]; ?></p>
                            		<P style="border-bottom:none; margin:auto"><span style="font-weight:600;color:#000">
                                    Matching Dresses &nbsp;&nbsp;: </span><?php echo $row[7]; ?></p>
                        
                        			<P style="border-bottom:none; margin:auto"><span style="font-weight:600;color:#000">
                                    Best Occasion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><?php echo $row[8]; ?></p>
                    
                    			</div>
                
                				<div class="mt-4">
                    
                    
                					<label>set date</label>
                        			<input type="date" name="txtDate" required="required" 
                                    value="<?php if(isset($_POST['txtDate'])){ echo $_POST['txtDate'];}?>"/>
                        
                    			</div>
                    
                    			<div>
                    			<label>set time</label>
                    	
                        		<select name="cmbTime" class="select_box">
    								<option value="">Not Set</option>
        							<option value="10:00AM">10:00AM</option>
        							<option value="12:00PM">12:00PM</option>
                            		<option value="03:00PM">03:00PM</option>
                            		<option value="05:00PM">05:00PM</option>
        
    							</select>
                    			</div>
                    
                    
                			</div>
                
                			<div class="col-lg-6" align="center">
                    				<button style="padding:10px 20px 10px 20px" type="submit" name="btnBookNowStyle" 
                                	class="btnBookNow ml-4">BOOK NOW</button>
                        		</form>
                			</div>
                
            
           
            			</div>
       
        			</div>
        
      			</div>
      
    		</div>
   
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