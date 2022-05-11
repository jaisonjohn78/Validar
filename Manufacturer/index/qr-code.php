<?php
include('config.php');
include('function.php');

if(isset($_POST['submit']))
    {
    $company_name = $_POST['company_name'];
    $brand_name = $_POST["brand_name"];
    $company_email = $_POST["company_email"];
    $product_img = $_FILES["uploadfile"]["name"];
    $product_img_tmp = $_FILES["uploadfile"]["tmp_name"];
    $folder = "product/".$product_img;
    $product_name = $_POST["product_name"];
    $category =  $_POST["category"];
    $price =  $_POST["price"];
    $lic_num = $_POST["lic_num"];
    $mfg_date = $_POST["mfg_date"];
    $ingredients = $_POST["ingredients"];
    $main_usage = $_POST["main_usage"];
    $useurl = $_POST["useurl"];
    $fssai_code = $_POST["fssai_code"];
    $customer_care = $_POST["customer_care"];
    $net_wt = $_POST["net_wt"];
    $exp_date = $_POST["exp_date"];
    $units = $_POST["units"]; 

    if (move_uploaded_file($product_img_tmp, $folder))  {
      $msg = "Image uploaded successfully";
      
    $query = "INSERT INTO `product` ( `company_name`,`brand_name`, `company_email`, `product_img`, `product_name`, `category`, `price`, `lic_num`,`mfg_date`,`ingredients`,`main_usage`,`useurl`,`fssai_code`,`customer_care`,`net_wt`,`exp_date`,`units`) VALUES
    ('$company_name', '$brand_name','$company_email', '$product_img', '$product_name', '$category', '$price', '$lic_num','$mfg_date','$ingredients','$main_usage','$useurl','$fssai_code','$customer_care','$net_wt','$exp_date','$units')";
    $query = mysqli_query($con,$query);
    if($query)
    {
      ?>
    <script>
      alert("Your Product has Successfully been added !!");
    </script>    
<?php
    }
    else{
?>
<script>
      alert("Oops!, Seems something went wrong... Please try again later");
    </script>
        <?php
    }
  }
    }else{
      $msg = "Failed to upload image";
    }

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

    <title>Validar QR Code Generator</title>

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
                <li class="menu-item active">
                  <a href="form-layouts-horizontal.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-detail"></i>
                    <div data-i18n="Horizontal Form">QR Generation</div>
                  </a>
                </li> 
            </li>

            <li class="menu-item">
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> QR Generator</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">

              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                      <div class="table-responsive text-center">
                      <table class="table user-table text-center ">
                        <thead>
                          <tr>
                            <th class="border-top-0">
                              #
                            </th>
                            <th class="border-top-0">
                              Product Name
                            </th>
                            <th class="border-top-0">
                              QR
                            </th>
                            <th class="border-top-0">
                              MRP
                            </th>
                            <th class="border-top-0">
                              Mgf Date
                            </th>
                            <th class="border-top-0">
                              Total Scanned
                            </th>
                          </tr>
                        </thead>

                        <tbody>


                        
                          <tr>
                            <td></td>
                            <td>
                              <h4>Hellp</h4>
                                <a href="qr_report.php">Report</a>
                            </td>
                            <td><img src="https://chart.apis.google.com/chart?cht=qr&chs=200x200&chco=1ab2ff&chl=<?php echo $qr_filter_paths ?>?id=<?php echo $id = 2 ?>" ><br><b><a href="">Download</a></b></td>
                            <td></td>
                            <td></td>
                          </tr>



                        </tbody>
                      </table>
                    </div>  
                      </div>
                  </div>
              </div>
               
                
              </div>
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
                  <a class="footer-link fw-bolder">SXCA Research Team</a>
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

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#inputGroupFile02").change(function(){
    readURL(this);
});

$("#defaultCheck300").change(function() {
  var elem = document.getElementById("fssai_code");
  elem.toggleAttribute("disabled");
});

$("#defaultCheck200").change(function() {
  var elem = document.getElementById("lic_id");
  elem.toggleAttribute("disabled");
});
      
    </script>
  </body>
</html>
