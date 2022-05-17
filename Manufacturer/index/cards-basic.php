<?php
include 'config.php';
$id = $_SESSION['man_data']->id;
$sql = "SELECT * FROM product WHERE uid= $id";
$result = mysqli_query($con, $sql);




?>

<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>My Products</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../assets/img/favicon/android-chrome-192x192.png" width="70" alt="App Logo" />
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Validar</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item ">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>    
           
            
        
            <li class="menu-item">
                <li class="menu-item ">
                  <a href="form-layouts-horizontal.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-detail"></i>
                    <div data-i18n="Horizontal Form">QR Generation</div>
                  </a>
                </li> 
            </li>

            <li class="menu-item active">
              <a href="cards-basic.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">My Product List</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="pages-account-settings-account.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account">Account</div>
                </a>
              </a>
            </li>

            
            <li class="menu-item">
              <a
                href="https://github.com/jaisonjohn78/Validar/issues"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item fixed-bottom mb-4">
            <div class="align-middle d-flex justify-content-center align-self-center ">
              <a href="logout.php" class="menu-link btn-warning align-items-center">
              <h5 class="mt-1 mb-1"><i class="menu-icon tf-icons bx bx-log-out"></i>
                Logout</h5>
              </a>
              </div>
            </li>
            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">My Products /</span> Product list</h4>



              <!-- Grid Card -->
              <h6 class="pb-1 mb-4 text-muted">All Products</h6>
              <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">

              
              <?php

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          echo "<div class='col'> <div class='card h-100'> <img class='card-img-top' src='product/". $row['product_img'] ."' alt='Card image cap'/> <div class='card-body'> <h4 class='card-title'>". $row['product_name'] ."</h4> <p class='card-text text-dark'>". $row['timestamp'] ."<br> Product ID: ". $row['id'] ." </p><h5 class='card-title'>". $row['product_name'] ."</h5><a href='qr-code.php?id=".$row['id']."' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>View More</a></div></div></div>";
                        }
                      } else {
                        echo "<h1>No Products</h1>";
                      }
                ?>                      
                 
                
              
           
              </div>
              
              

              <!-- Masonry -->
              <!-- <h6 class="pb-1 mb-4 text-muted">Masonry</h6> -->
             
              <!--/ Card layout -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">SXCA Research team</a>
                </div>
              
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

  

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/masonry/masonry.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
