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
            <a href="index.html" class="app-brand-link">
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
              <a href="index.html" class="menu-link">
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
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">My Product List</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="pages-account-settings-account.html" class="menu-link">
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
                <!-- Basic Layout -->
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Enter Details for your product</h5>
                      <small class="text-muted float-end">My Product</small>
                    </div>
                    <div class="card-body">
                      <form action="form-layouts-horizontal.php" method="post" enctype="multipart/form-data">

                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Company</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                name="company_name"
                                id="basic-icon-default-fullname"
                                placeholder="ITC, Nestle, etc"
                                aria-label="ITC, Nestle, etc"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Brand Name</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-company"
                                class="form-control"
                                name="brand_name"
                                placeholder="Sunfeast, Maggie, Marigold, etc"
                                aria-label="Sunfeast, Maggie, Marigold, etc"
                                aria-describedby="basic-icon-default-company2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Company Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                              <input
                                type="text"
                                id="basic-icon-default-email"
                                name="company_email"
                                class="form-control"
                                placeholder="john.doe@work.com"
                                aria-label="john.doe@work.com"
                                aria-describedby="basic-icon-default-email2"
                              />
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>

                      <div class="row my-3">
                        <div class="input-group">
                          <label class="input-group-text" for="inputGroupFile02">Product Image</label>
                        <input type="file" name="uploadfile" class="form-control" id="inputGroupFile02" />
                      </div>
                    </div>
                    <img id="blah" class="rounded mx-auto d-block" src="../assets/img/elements/empty.png" width="400" alt="Product" />
                        
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Product Name</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              name="product_name"
                              class="form-control"
                              id="basic-default-company"
                              placeholder="Amul Buttemilk."
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Category</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="category" id="exampleFormControlSelect1" aria-label="Default select example">
                              <option selected>Open this select Category</option>
                              <option value="1">Food</option>
                              <option value="2">Clothing</option>
                              <option value="3">Accesories</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Do You Have Fssai code?</label>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox"  id="defaultCheck300" value="" name="fssai_check"/>
                              <label class="form-check-label" for="defaultCheck3"> No we Don't have  </label>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Fssai Code</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              name="fssai_code"
                              class="form-control"
                              id="fssai_code"
                              placeholder="ACME Inc."
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Net Weight</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              name="net_wt"
                              class="form-control"
                              id="basic-default-company"
                              placeholder="Amul Buttemilk."
                            />
                          </div>
                        </div>
                        <div class="row mb-3 d-flex">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Price Per Unit</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <span class="input-group-text">$</span>
                              <input
                                type="text"
                                name="price"
                                class="form-control"
                                placeholder="Amount"
                                aria-label="Amount (to the nearest dollar)"
                              />
                              <span class="input-group-text">.00</span>
                            </div>
                          </div>
                          <label class="col-sm-2 col-form-label" for="basic-default-company">GST Per Unit</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <span class="input-group-text">$</span>
                              <input
                                type="text"
                                name="gst"
                                class="form-control"
                                placeholder="Amount"
                                aria-label="Amount (to the nearest dollar)"
                              />
                              <span class="input-group-text">.00</span>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Do You Have License?</label>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input lic_check_id" type="checkbox" value="0" id="defaultCheck200" name="lic_check"  />
                              <label class="form-check-label" for="defaultCheck3"> No we Don't have  </label>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Licence Number</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              name="lic_num"
                              class="form-control"
                              id="lic_id"
                              placeholder="188282838"
                            />
                          </div>
                        </div>
                        
                       
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                              <input
                                type="email"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="Customer Care"
                                aria-label="Customer Care"
                                aria-describedby="basic-icon-default-email2" 
                              />
                              <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span> -->
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Customer Care Number</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                              ></span>
                              <input
                                type="text"
                                name="customer_care"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Ingredients</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              name="ingredients"
                              class="form-control"
                              placeholder="milk(40%) , water (7.5%)"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                            ></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">What is the main usage</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              name="main_usage"
                              class="form-control"
                              placeholder="Used for drinking and used as a Ingredient in a recipe"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                            ></textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">How to use? (URL)</label>
                          <div class="col-sm-10">
                            <input type="url" name="useurl"
                              id="basic-default-message"
                              class="form-control"
                              placeholder="https://example.youtube.com"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                            />
                            
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Manufacturing DateTime</label>
                          <div class="col-md-10">
                            <input
                              class="form-control"
                              name="mfg_date"
                              type="datetime-local"
                              value="2021-06-18T12:30:00"
                              id="html5-datetime-local-input"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Expiry Date</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              name="exp_date"
                              class="form-control"
                              id="basic-default-company"
                              placeholder="Best Before 9 months from the date of Manufacturing  "
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Units Produced</label>
                          <div class="col-sm-10">
                            <input
                              type="numbers"
                              name="units"
                              class="form-control"
                              id="basic-default-company"
                              placeholder="100"
                            />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Send</button>
                          </div>
                        </div>
                      </form>
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
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">SXCA Research Team</a>
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
