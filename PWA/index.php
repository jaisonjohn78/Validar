<?php
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../public/index.php");
  }

error_reporting(0);

    $sql = "SELECT * FROM users WHERE id='" . $_SESSION["user_id"] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
    </head>
    <style>
    body {
        background: var(--main-color);
    }
    header {
     position: fixed;
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
    .main-wrapper .item1 {
        position: relative;
        text-align: center;
        width: 100%;
        height: 12vh;
        background-color: #3AA3FF;
        box-shadow:  5px 5px 10px #777777d5,
             -5px -5px 10px #ffffff91;
        border-radius: 20px;
        padding: 10px 20px;
        left: -60px;
    }
    .main-wrapper .item2 {
        position: relative;
        text-align: center;
        width: 100%;
        height: 12vh;
        background-color: #3AA3FF;
        box-shadow:  5px 5px 10px #777777d2,
             -5px -5px 10px #ffffff94;
        border-radius: 20px;
        padding: 10px 20px;
        margin-top: 18px;
        right: -90px;
    }
    </style>
    <body>
    <!-- <div class="splash">
        <img src="img/loading.gif" id="loader" alt="loading gif">
    </div> -->

    <header>
        <nav>
            <div class="info">
                <p>Welcome <?php echo $row['full_name']; ?> !</p>
                <p>Let's Keep Track on your Expenses</p>
            </div>
            <div class="img" style="background-image: url(img/user.png)"></div>
        </nav>
        <section>
            <div class="main-wrapper">
                <div class="item1">
                    <h1>&#8377; 5000/-</h1>
                </div>
                <div class="item2">
                    <h1>&#8377; 5000/-</h1>
                </div>
            </div>
        </section>
    </header>
     
        

  




<div class="categories section-wrapper">
    Categories wise Expenses
    <div class="category-items">
        <div class="category-item">
                <div class="item-img exp-ratio-category">&#8377; <?php echo $row['food']; ?></div>
                <h4>Food & Beverages</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['health']; ?></div>
            <h4>Healthcare</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['dairy']; ?></div>
            <h4>Dairy Product</h4>
        </div>
        <div class="category-item">
            <div class="item-img exp-ratio-category">&#8377; <?php echo $row['beauty']; ?></div>
            <h4>Beauty & Hygiene</h4>
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

            <a href="profile.php"><div class="nav-items">
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
    if (screen.width >= 700) {
    document.location = "mobile_ui.html";
    }
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $(".splash").delay(2000).fadeOut(1000);
    return false;
});
</script>
</body>
</html>