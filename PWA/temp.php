
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1,minimum-scale=1">
    <title>Validar</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="assets/jquery.min.js"></script>
    <style>
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
    </style>
</head>
<body>
    <div class="splash">
        <img src="img/loading.gif" id="loader" alt="loading gif">
    </div>
    <header>
        <nav>
            <div class="info">
                <p>Welcome <?php echo $row['full_name']; ?>!</p>
                <p>Let's search your grocery food</p>
            </div>
            <div class="img" style="background-image: url(img/user.jpg)"></div>
        </nav>
        <div class="search">
            <span class="las la-search"></span>
            <input type="text" placeholder="Search your daily Grocery food ...">
        </div>
    </header>
    
    <main>
        <div class="categories section-wrapper">
            <div class="flex-header">
                <h2>Categories</h2>
                <a href="category.html">See all</a>
            </div>
            <div class="items">
                <div class="item">
                    <div class="item-img" style="background-image: url(img/veg.jpeg)"></div>
                    <h4>Vegetables</h4>
                </div>
                <div class="item">
                    <div class="item-img" style="background-image: url(img/fruits.jpeg)"></div>
                    <h4>Fruits</h4>
                </div>
                <div class="item">
                    <div class="item-img" style="background-image: url(img/meat.jpeg)"></div>
                    <h4>Meat</h4>
                </div>
                <div class="item">
                    <div class="item-img" style="background-image: url(img/veg.jpeg)"></div>
                    <h4>Vegetables</h4>
                </div>
                <div class="item">
                    <div class="item-img" style="background-image: url(img/fruits.jpeg)"></div>
                    <h4>Fruits</h4>
                </div>
                <div class="item">
                    <div class="item-img" style="background-image: url(img/meat.jpeg)"></div>
                    <h4>Meat</h4>
                </div>

            </div>
        </div>
        
        <div class="promo">
            <div class="items promo-items">
                <div class="promo-item">
                    <div class="promo-img" style="background-image: url(img/apples.png)"></div>
                    <div class="promo-info">
                        <h3>30% Discount</h3>
                        <p>Order any food from app and get discount</p>
                        <a href="">Order now</a>
                    </div>
                </div>
                <div class="promo-item">
                    <div class="promo-img" style="background-image: url(img/banana.png)"></div>
                    <div class="promo-info">
                        <h3>30% Discount</h3>
                        <p>Order any food from app and get discount</p>
                        <a href="">Order now</a>
                    </div>
                </div>

            </div>
        </div>
        
        
        <div class="popular section-wrapper">
            <div class="flex-header">
                <h2>Popular deals</h2>
                <a href="">See all</a>
            </div>
            <div class="items">
                <div class="popular-item">
                    <div class="popular-img" style="background-image: url(img/1.jpeg)"></div>
                </div>
                <div class="popular-item">
                    <div class="popular-img" style="background-image: url(img/2.jpeg)"></div>
                </div>
                <div class="popular-item">
                    <div class="popular-img" style="background-image: url(img/3.jpeg)"></div>
                </div>
                <div class="popular-item">
                    <div class="popular-img" style="background-image: url(img/4.jpeg)"></div>
                </div>
            </div>
        </div>
    </main>
    
    
    <div class="bottom-nav">
        <div class="bottom-inner">
            <div class="bottom-main">
                <a href="index.html"><div class="nav-items">
                    <div class="nav-item">
                        <span class="las la-home"></span>
                        <p>Home</p>
                    </div>
                </div></a>

                <a href="qrcode.html"><div class="nav-item-main">
                    <div>
                        <span class="las la-qrcode"></span>
                    </div>
                </div></a>

                <a href="profile.html"><div class="nav-items">
                    <div class="nav-item">
                        <span class="las la-user"></span>
                        <p>User</p>
                    </div>
                </div></a>
            </div>
        </div>
    </div>


</body>
</html>