<?php 
	include 'config.php';
            
	$sql = "SELECT * FROM users WHERE id='{$_SESSION["user_id"]}'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
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
<body>
   
    <div class="product-header">
        <div class="flex">
            <a href="category.html"><span class="las la-angle-left"></span></a>
        </div>
        <div class="product-img" style="background-image: url(img/strawberry.png)"></div>
    </div>
    
    <main>
        <div class="product-details section-wrapper">
            <h2>Strawberry</h2>
            <small>$17.00/kg</small>
            <div class="details">
                <div>
                    $17.20
                </div>
                <div>
                    14 Calories
                </div>
                <div>
                    <span class="las la-star"></span>
                    4.5(257)
                </div>
            </div>
            <div class="actions">
                <button>
                    <span class="las la-minus"></span>
                </button>
                <input type="text" value="4 kg">
                <button>
                    <span class="las la-plus"></span>
                </button>
            </div>
        </div>
        
        <div class="product-desc section-wrapper">
            <div class="flex">
                <h3>Details</h3>
            </div>
            <div class="description">
                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century</p>
                <ul>
                    <li>Provides more vitamins than Orange</li>
                    <li>High levels of antioxidants</li>
                </ul>
            </div>
        </div>
        
        
        
    </main>
    
</body>
</html>