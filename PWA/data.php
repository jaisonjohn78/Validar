<?php 
	include 'config.php';
    // $user_id = $_SESSION["user_id"];
   $user_id= $_SESSION["user_id"];



    $get_id = $_GET['id'];

    $flag='';
    if(!is_numeric($get_id)){
        $flag=true;
    }
    if($flag){
        echo "<script>alert('this is not a valid qr code'); window.location.href='qrcode.php';</script>";
    }

  

    $sub_get_id = substr($get_id,0,6);
   
    $msg= "This Product is Valid ! You can Buy this product.";
    $valid_msg="Valid";

    $sql = "SELECT * FROM product WHERE `qr_code`=$sub_get_id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    $unit_sql = "SELECT * FROM units WHERE `qr_code`=$get_id";
    $unit_result = mysqli_query($conn, $unit_sql);
    $unit_row = mysqli_fetch_assoc($unit_result);
    $mystatus = $unit_row['status'];



    $product_name = $row['product_name'];
    $product_price = $row['price'];
    $man_id =$row['uid'];
    $users= $_SESSION["user_id"];

    

    if(isset($_POST['cancel'])){
        header("Location:qrcode.php");
    }
    if(isset($_POST['buy'])){
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        // gettin user details ot get category of user table
        $get_users = "SELECT * FROM users WHERE id='" . $_SESSION["user_id"] . "'";
        $get_exec = mysqli_query($conn, $get_users);
        $row_get = mysqli_fetch_assoc($get_exec);


        //getting category from category table to match with product table
        $category = $row['category'];
        $category_new = "SELECT * FROM category WHERE id=$category";
        $exec = mysqli_query($conn,$category_new);
        $row_category =mysqli_fetch_assoc($exec);
        $original_category = $row_category['category'];
        

        //fetching previous amount and adding amount of product ->updating
  
      $price =$row_get[$original_category] + $row['price'];
      
        //updation
       $sql_update = "UPDATE users SET `$original_category`=$price  WHERE id=$user_id";
       $run =mysqli_query($conn,$sql_update);
       if($run){
        echo "<script>alert('Product has been Successfully added to your purchase list ! '); 
        
        </script>";
       }else{
        "<script>alert('OOPS ! product not added to purchase list!'); </script>";
       }
       $status = '0';
       $update_status = "UPDATE units SET `status` = $status WHERE qr_code = $get_id";
       $run_status = mysqli_query($conn,$update_status);
       
     //updating manufacturer details
       $manufact_query =mysqli_query($conn,"SELECT * FROM manufacturer WHERE id = $man_id");
       $man_result =mysqli_fetch_assoc($manufact_query);

       $old_sales = $man_result['sales'];
       $new_sales = $old_sales + $row['price'];
 
   
       $today = date("Y-m-d");
       $qr_code=mysqli_query($conn,"SELECT amount,count,product_name,qr_code,timestamp FROM cart WHERE product_name = '$product_name' AND timestamp = '$today'");
       $qr_result =mysqli_fetch_assoc($qr_code);
       $product_name1 = $qr_result['product_name'];
       $count = $qr_result['count'];
       $timestamp = $qr_result['timestamp'];
       $amount = $qr_result['amount'];
       $up_amount = $amount + $product_price;
       $up_count = $count + 1;
       

       if($product_name == $product_name1 && $timestamp == $today){
           mysqli_query($conn,"UPDATE cart SET `amount` = '$up_amount',`count`='$up_count',`timestamp`='$today' WHERE product_name = '$product_name1'");
           header("location: qrcode.php?id=".$get_id."");
       }else{
           mysqli_query($conn,"INSERT INTO `cart`(`u_id`,`qr_code`,`product_name`,`price`,`amount`,`timestamp`,`latitude`,`longitude`) VALUES ('$users','$get_id','$product_name','$product_price','$product_price','$today','$latitude','$longitude')");
           header("location: qrcode.php?id=".$get_id."");
       }

       $manufact_update = "UPDATE manufacturer SET `sales`=$new_sales  WHERE id=$man_id";
       $run_manufact = mysqli_query($conn,$manufact_update);
       if($run_manufact){
        "<script>alert('Done'); </script>";
       }else{
        "<script>alert('OOPS ! not added'); </script>";
       }
    }

    if($mystatus == 0 || $mystatus == NULL){
        echo "<script>alert('This product is already sold out');</script>";
        $msg= "This Product is Sold ! Please Check this product.";
        $valid_msg="Sold";
    }
    else {
        $msg= "This Product is Valid ! You can Buy this product.";
        $valid_msg="Valid";
    }
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1,minimum-scale=1">
    <title>Scans</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .details_ul li{
        color:#033E3E;
        list-style:none;
        text-align:center;
    }
    .details_ul li b{
        font-family: 'Poppins', sans-serif;
        font-size:1.15rem;
        color:white;
        }

    .dates{
     font-size: .9rem;
    font-weight: 600;
    color: #777;
    display: inline-block;
    margin: .5rem 0rem;
    }
    .buttons{
        background-color:var(--main-color);
        font-size:1.2rem;
        color:white;
        padding:8px 10px;
        border-radius:12px;
        margin:8px;
        width:100px;
        font-weight:bolder;
        border:1px solid gray;
    }
    .valid_status{
        background-color:green;
        color:white;
        padding:4px;
        border-radius:7px;
    }
</style>
<body onload = "getLocation();">
   
    <div class="product-header">
        <div class="flex">
            <a href="qrcode.php"><span class="las la-angle-left"></span></a>
        </div>
        <!-- $folder = "product/".$product_img; -->
        <!-- ../Manufacturer/index/product/ -->
        <div class="product-img" style="background-image: url(<?php echo '../Manufacturer/index/product/'.$row['product_img'] ;?>)"></div>
    </div>
    
    <main>
        <?php
        $category = $row['category'];
        $category_new = "SELECT * FROM category WHERE `id`=$category";
        $exec = mysqli_query($conn,$category_new);
        $row_category =mysqli_fetch_assoc($exec);
        ?>
        <div class="product-details section-wrapper">
            <h2><?php echo $row['product_name'];?></h2>
            <small><?php echo $row_category['category'];?></small>
            <div class="details">
                <div>
                 <?php echo $row['net_wt'];?>
                </div>
                <div>
                <?php echo $row['company_name'];?>
                </div>
                <div>
                    <!-- <span class="las la-star"></span> -->
                    Scaned(<?php echo  $unit_row['scans']; ?>)
                </div>
                
            </div>
            <small class="dates"><?php echo 'Mfg Date: '.$row['mfg_date'];?></small><br>
            <small class="dates"><?php echo $row['exp_date'];?></small><br>
            
            
            <!-- <div class="actions"> -->
                
                    <!-- <span class="las la-minus"></span> -->
                    
                
                <span style="width:60px;font-size:20px;">&#8377;<?php echo $row['price'];?></span>
               
            <!-- </div> -->
        </div>
        <div class="product-details section-wrapper">
            <?php
            
            $location_query=mysqli_query($conn,"SELECT * FROM units WHERE qr_code = $get_id");
            $location_result = mysqli_fetch_assoc($location_query);
            
            ?>
            <h2>Scanning Results</h2>
            <small><?php echo $row_category['category'];?></small>
            <div class="details">
                <div>Location:<br>
                 <?php echo $location_result['location']?>
                </div>
                <div>
                    <span class="valid_status"><?php echo $valid_msg?></span>
                </div>
                <div>
                    <!-- <span class="las la-star"></span> -->
                   timestamp: <br><?php echo $location_result['timestamp']?>
                    <!-- Scaned(257) -->
                </div>
                
            </div>
            <small class="dates"><?php echo $msg;?></small><br>
        </div>
        
        <div class="product-desc section-wrapper">
            <div class="flex">
                <h3>Products Details</h3>
            </div>
            <div class="description">
                <p>
                <ul class="details_ul">
                    <li><b style="color:white;">Brand name:</b> <br>
                <?php echo $row['brand_name']?></li>
                
                    <li><b>Ingredients:</i></b><br><?php echo $row['ingredients'];?></li>

                    <li><b>Main usage:</i></b><br><?php echo $row['main_usage'];?></li>


                    <li><b>How to use? check below url:</i></b><br> <a href="<?php echo $row['useurl'];?>" style="text-decoration:underline">Click Here</a></li>
 

                    <li><b>Included GST:</i></b><br>&#8377;<?php echo $row['gst'].'/-';?></li>

                

                    <li><b>Net Weight:</i></b><br><?php echo $row['net_wt'];?></li>

                    <li><b>Customer care:</i></b><br><?php echo $row['customer_care'];?></li>

                    <li><b>Fssai code:</i></b><br><?php echo $row['fssai_code'];?></li>

                 


                   
                </ul>
                </p>
                
            </div>
            <form action="" method="post" class="myForm" id="myform">
               <div class="button_div" style="text-align:center">
                    <input type="hidden" name="latitude" value="">
                    <input type="hidden" name="longitude" value="">
                   <input type="submit" name="buy" class="buttons" value="Buy">
                   <input type="submit" name="cancel" class="buttons" value="Cancel">
            </form>
               </div>
        </div>
        
        
        
    </main>
    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            }
            
        }
        function showPosition(position) {
            document.querySelector('.myForm input[name = "latitude"]').value=position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value=position.coords.longitude;
        }
        function showError(error){
            switch(error.code){
                case error.PERMISSION_DENIED:
                    alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                    location.reload();
                    break;
            }
        }
        
        </script>
</body>
</html>