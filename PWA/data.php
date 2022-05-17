<?php 
	include 'config.php';
    // $user_id = $_SESSION["user_id"];
   $user_id= $_SESSION["user_id"];


   
    
    // $man_id = $_SESSION['man_data'];
	$sql = "SELECT * FROM users WHERE id='{$_SESSION["user_id"]}'";

    $get_id = $_GET['id'];
    
    $sql = "SELECT * FROM product WHERE `qr_code`=$get_id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    if(isset($_POST['cancel'])){
        header("Location:qrcode.php");
    }
    if(isset($_POST['buy'])){
        $get_users = "SELECT * FROM users WHERE id='" . $_SESSION["user_id"] . "'";
        $get_exec = mysqli_query($conn, $get_users);
        $row_get = mysqli_fetch_assoc($get_exec);

        $category = $row['category'];
        $category_new = "SELECT * FROM category WHERE id=$category";
        $exec = mysqli_query($conn,$category_new);
        $row_category =mysqli_fetch_assoc($exec);
        $original_category = $row_category['category'];
        

        
        echo $original_category;
      $price =$row['price'];
      echo $price;




       $sql_update = "UPDATE users SET `$original_category`=$price  WHERE id=1";
       $run =mysqli_query($conn,$sql_update);
       if($run){
           echo "done";
       }else{
           echo "NOOOOOOOOOOOOT DONE ";
       }
   
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
        color:#333;
        list-style:none;
        text-align:center;
    }
    .details_ul li i{
        text-decoration:underline;
        font-size:1.15rem;
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
    }
</style>
<body>
   
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
                 <?php echo $row['net_wt'].'g';?>
                </div>
                <div>
                <?php echo $row['company_name'];?>
                </div>
                <div>
                    <!-- <span class="las la-star"></span> -->
                    Scaned(257)
                </div>
                
            </div>
            <small class="dates"><?php echo 'Mfg Date: '.$row['mfg_date'];?></small><br>
            <small class="dates"><?php echo $row['exp_date'];?></small><br>
            
            
            <!-- <div class="actions"> -->
                
                    <!-- <span class="las la-minus"></span> -->
                    
                
                <input type="text" style="width:60px" value="&#8377 <?php echo $row['price'];?>">
               
            <!-- </div> -->
        </div>
        
        <div class="product-desc section-wrapper">
            <div class="flex">
                <h3>Products Details</h3>
            </div>
            <div class="description">
                <p>
                <ul class="details_ul">
                    <li><b><i style="color:white;">Brand name:</i></b> <br>
                <?php echo $row['brand_name']?></li>
                
                    <li><b><i style="color:white;">ingredients:</i></b><br><?php echo $row['ingredients'];?></li>

                    <li><b><i style="color:white;">Main usage:</i></b><br><?php echo $row['main_usage'];?></li>


                    <li><b><i style="color:white;">How to use? check below url:</i></b><br> <a href="<?php echo $row['useurl'];?>" style="text-decoration:underline">Click Here</a></li>
 

                    <li><b><i style="color:white;">included GST:</i></b><br>&#8377;<?php echo $row['gst'].'/-';?></li>

                

                    <li><b><i style="color:white;">Net Weight:</i></b><br><?php echo $row['net_wt'].'g';?></li>

                    <li><b><i style="color:white;">Customer care:</i></b><br><?php echo $row['customer_care'];?></li>

                    <li><b><i style="color:white;">fssai code:</i></b><br><?php echo $row['fssai_code'];?></li>

                 


                   
                </ul>
                </p>
                
            </div>
            <form action="" method="post">
               <div class="button_div" style="text-align:center">
                   <input type="submit" name="buy" class="buttons" value="Buy">
                   <input type="submit" name="cancel" class="buttons" value="Cancel">
            </form>
               </div>
        </div>
        
        
        
    </main>
    
</body>
</html>