<?php
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../public/index.php");
  }

error_reporting(0);

    $sql = "SELECT * FROM users WHERE id='" . $_SESSION["user_id"] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sum_sql = "SELECT sum(Food + Healthcare + dairy + Beauty + electronic + others) AS total FROM users WHERE id='" . $_SESSION["user_id"] . "'";
    $sum_result = mysqli_query($conn, $sum_sql);
    $sum_row = mysqli_fetch_assoc($sum_result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1,minimum-scale=1">
    <title>Validar</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="assets/jquery.min.js"></script>
    <script src="assets/app.js"></script>
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="img/android/android-launchericon-96-96.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#34a9e0">
    <meta name="theme-color" content="#34a9e0">

    </head>
    <style>
    body {
        background: var(--main-color);
    }
    header {
     position: fixed;
     width: 100vw;
    }
    .categories.section-wrapper {
        /* position: sticky; */
        transform: translate(0%, 50%);
        padding-bottom: 10rem;
    }
.item-img {
    width: 100%;
    height: 100px;
    border-radius: 20px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}


.exp-ratio{
    font-size: 6vw;
    color:white;
    word-wrap: break-word;
    font-weight: 600;
    padding:1px 2px 2px;
    padding-bottom: 2px;
  
}
.exp-ratio-category{
    font-size: 1.5rem;
    color:rgb(239, 30, 65);
    display: flex;
    flex-direction: column;
    justify-content: center;
   text-align: center;
   
}
.category-item h4{
    margin-top: 10px;
}
.splash {
            position: absolute;
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            background-color: #f2276c;

        }
        #loader {
            width: 270px;
        }

    .main-wrapper {
        margin-top: 20px;
        width: 100%;
        height: 100vh;
  
       
    }
    .main-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: 20px auto;
        
        width: fit-content;
        height: 12vh;
        background-color: rgb(250, 63, 94);
        box-shadow:  5px 5px 10px #777777d5,
             -5px -5px 10px #ffffff91;
        border-radius: 10px;
        padding: 10px 3.5rem;
    }
    .item1 h1 {
        -webkit-text-fill-color: white; /* Will override color (regardless of order) */
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;
    }
    .circles {
        position: absolute;
        z-index: -1;
        right: -200px;
        top: 0;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
        background-size: 400% 400%;
        animation: gradientBG 8s ease infinite;
    }
    .circles::before {
        content: '';
        position: absolute;
        z-index: -1;
        left: -100%;
        top: 50%;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background-image: linear-gradient(to right top, #d756d7, #ff5595, #ff865a, #f8bc3e, #c0e868);
        background-size: 400% 400%;
        animation: gradientBG 8s ease infinite;
        

    }
    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;

        }
        50% {
            background-position: 100% 50%;
            transform: translate(0, -5%);
        }
        100% {
            background-position: 0% 50%;
        }
    }
        
    </style>
    <body>
    <!-- <div class="splash">
        <img src="img/loading.gif" id="loader" alt="loading gif">
    </div> -->

    <header>
        <nav>
            <div class="info">
                <h2 style="color: white;">Welcome <?php echo $row['full_name']; ?> !</h2>
                <p>Let's Keep Track on your Expenses</p>
            </div>
        </nav>
        <section>
            <div class="main-wrapper">
                <div class="item1">
                    <h1>&#8377; <?php echo $sum_row['total']; ?>/-</h1>
                    <p>Total Expenses</p>
                </div>
            </div>
        </section>
        <div class="circles"></div>
    </header>
     
        

  




<div class="categories section-wrapper">
    Categories wise Expenses
    <div class="category-items">
        <div class="category-item">
                <div class="item-img exp-ratio-category">&#8377; <?php echo $row['Food']; ?></div>
                <h4>Food & Beverages</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['Healthcare']; ?></div>
            <h4>Healthcare</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['dairy']; ?></div>
            <h4>Dairy Product</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['Beauty']; ?></div>
            <h4>Beauty & Hygiene</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['electronic']; ?></div>
            <h4>Electronic Appliance</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['others']; ?></div>
            <h4>Others</h4>
        </div>
    </div>
</div>

<!-- nav  -->
<div class="bottom-nav">
    <div class="bottom-inner">
        <div class="bottom-main">
            <a href="index.php"><div class="nav-items">
                <div class="nav-item">
                    <span class="las la-home"></span>
                    <p>Home</p>
                </div>
            </div></a>

            <a href="qrcode.php"><div class="nav-item-main">
                <div>
                    <span class="las la-qrcode"></span>
                </div>
            </div></a>

            <a href="profile.html"><div class="nav-items">
                <div class="nav-item">
                    <span class="las la-info"></span>
                    <p>About</p>
                </div>
            </div></a>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){
    // if (screen.width >= 300) {
    // document.location = "mobile_ui.html";
    // }
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $(".splash").delay(2000).fadeOut(1000);
    return false;
});
</script>
</body>
</html>