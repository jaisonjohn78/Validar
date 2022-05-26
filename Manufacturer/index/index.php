<?php
include 'config.php';

if(!isset($_SESSION["man_data"])){
  header("Location:../../public/manufactLanding.php");
}

$id = $_SESSION['man_data']->id;
$sql = "SELECT * FROM manufacturer WHERE id= $id";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$sales = $row['sales'];
$cost = $row['cost'];

$gross_profit = mysqli_query($con,"SELECT SUM(price) AS price,sum(cost) as cost,sum(gst) as gst FROM `product` WHERE id IN(select p_id from units where status = 0)");
$gross_row=mysqli_fetch_assoc($gross_profit);
   $total_price =  $gross_row['price'];
   $total_cost = $gross_row['cost'];
   $gst = $gross_row['gst'];
   $profit = $total_price - $total_cost;
   $profit_per = $profit/100;
if($sales == 0 && $cost == 0){
  $gross_profit = 0; 
} else {
  if($sales == 0) {
    $gross_profit = 0;
  } else {
    $gross_profit = sprintf('%.2f',($total_price - $total_cost)/$total_price*100);
    if($gross_profit < 0){
      $gross_profit = 0;
    }
  } 
}

$sales_per = $sales/100;
// sprintf('%.2f', $num)
$first = "SELECT count(category) AS category FROM product WHERE uid = $id AND category = 1";
$first_res = mysqli_query($con,$first);
$first_row=mysqli_fetch_assoc($first_res);
$first_category = $first_row['category'];

$second = "SELECT count(category) AS category FROM product WHERE uid = $id AND category = 2";
$second_res = mysqli_query($con,$second);
$second_row=mysqli_fetch_assoc($second_res);
$second_category = $second_row['category'];

$third = "SELECT count(category) AS category FROM product WHERE uid = $id AND category = 3";
$third_res = mysqli_query($con,$third);
$third_row=mysqli_fetch_assoc($third_res);
$third_category = $third_row['category'];

$fifth = "SELECT count(category) AS category FROM product WHERE uid = $id AND category = 4";
$fifth_res = mysqli_query($con,$fifth);
$fifth_row=mysqli_fetch_assoc($fifth_res);
$fifth_category = $fifth_row['category'];

$fourth = "SELECT count(category) AS category FROM product WHERE uid = $id AND category = 5";
$fourth_res = mysqli_query($con,$fourth);
$fourth_row=mysqli_fetch_assoc($fourth_res);
$fourth_category = $fourth_row['category'];

$to_order = "SELECT sum(count) AS count FROM cart ";
$order_result = mysqli_query($con,$to_order);
$order_row=mysqli_fetch_assoc($order_result);
$total_order = $order_row['count'];

$scan = "SELECT sum(scans) AS scans FROM units ";
$scan_result = mysqli_query($con,$scan);
$scan_row=mysqli_fetch_assoc($scan_result);
$scan_total = $scan_row['scans'];

$total = "SELECT count(category) AS category FROM product WHERE uid = $id";
$product_res = mysqli_query($con,$total);
$product_row=mysqli_fetch_assoc($product_res);
$total_product = $product_row['category'];

$location = "SELECT latitude,longitude from cart where id = (SELECT MAX(id) AS id from cart)";
$location_res = mysqli_query($con,$location);
$location_row=mysqli_fetch_assoc($location_res);
// $latitude = $location_row['latitude'];
// $longitude = $location_row['longitude'];

$chart_res=mysqli_query($con,"SELECT units,timestamp,id,uid FROM product where uid=$id ORDER BY timestamp DESC limit 6 ");                                    // die();
                $i=1;
                while($chart_row=mysqli_fetch_assoc($chart_res)){
                  $units[] = $chart_row['units'];
                  $timestamp[] = $chart_row['timestamp'];
                }
              
$get_users = "SELECT SUM(units) AS units FROM product where uid = $id";
$get_exec = mysqli_query($con, $get_users);
$row_get = mysqli_fetch_assoc($get_exec);
$total_units = $row_get['units'];
?>

<!DOCTYPE html>
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

    <title>Validar Dashboard</title>
<!-- <img src="../../public/manufactLanding.php" alt=""> -->
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

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
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
         
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>    
           
            
        
            <li class="menu-item">
                <li class="menu-item">
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
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <script>
                  //GOOGLE SEARCH
                  //Enter domain of site to search.
                  var domainroot="example.com"
                  function Gsitesearch(curobj){ curobj.q.value="site:"+domainroot+" "+curobj.qfront.value } 
                  </script>
                <form class="search navbar-form navbar-right" action="http://www.google.com/search" method="get"role="search" onSubmit="Gsitesearch(this)" target="_blank"> 
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="search"
                    class="form-control border-0 shadow-none"
                    placeholder="Search on Google..."
                    aria-label="Search on Google..."
                    name="q"
                    autocomplete="off"
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['full_name']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <div class="flex-grow-1">
                      <small class="text-muted px-1"><?php echo $row['email']; ?></small><br>
                    </div>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Congratulations <?php echo $row['full_name']; ?>! 🎉</h5>
                          <p class="mb-4">
                            You have done <span class="fw-bold"><?php echo $gross_profit ?>%</span> more sales today. You can check and keep track on your products
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View my products</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Profit</span>
                          <h3 class="card-title mb-2">&#8377;<?php echo $profit?></h3>
                          <?php 
                            if($profit_per > 0) {
                            ?>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i><?php echo $profit_per ?>%</small>
                          <?php
                            }else {
                            ?>
                              <small style="color: red;" class="fw-semibold"><i class="bx bx-down-arrow-alt"></i><?php echo $profit_per ?>%</small>
                            <?php
                            }
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span>Sales</span>
                          <h3 class="card-title text-nowrap mb-1">&#8377;<?php echo $row['sales'];?></h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?php echo $sales_per ?>%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">All Category</h5>
                         
                        <div id="totalRevenueChart" class="px-2"></div>
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-primary"
                                type="button"
                                id="growthReportId"
                                
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                2021 - 2022
                              </button>
 
                            </div>
                          </div>
                        </div>
                        <div id="growthChart"></div>
                        <div class="text-center fw-semibold pt-3 mb-2">Gross Profit Margin</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>Sales</small>
                              <h6 class="mb-0">&#8377;<?php echo $sales?></h6>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>Costing</small>
                              <h6 class="mb-0">&#8377;<?php echo $cost ?></h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <small class="text-success fw-semibold align-items-center" ><i class="bx bx-up-arrow-alt"></i> 100%</small>
                          <div class="card-title d-flex align-items-start justify-content-center">
                            <div class="avatar flex-shrink-0 ">
                              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1 text-center">Code Scanned</span><br>
                          <h3 class="card-title mb-2 text-center"><?php echo $scan_total ?></h3>



                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">AI Sales Predection</h5>
                                <span class="badge bg-label-warning rounded-pill">1 Point = 50 - 100 Unit </span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> Next Increament</small
                                >
                                <h3 class="mb-0">+<span id="sales-predection">2000</span> Point</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Category Statistics</h5>
                        <small class="text-muted">&#8377;<?php echo $sales ?> Total Sales</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <!-- <i class="bx bx-dots-vertical-rounded"></i> -->
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2"><?php echo $total_order ?></h2>
                          <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                              ><i class="bx bx-wink-smile"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Food & Beverages</h6>
                              <small class="text-muted"></small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold"><?php echo $first_category ?></small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-donate-heart"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Healthcare</h6>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold"><?php echo $second_category ?></small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);"><path d="M15.16 2a1 1 0 0 0-.66.13l-12 7a.64.64 0 0 0-.13.1l-.1.08a1.17 1.17 0 0 0-.17.26.84.84 0 0 0-.1.43v10a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V10a8.08 8.08 0 0 0-6.84-8zm0 2.05A6.07 6.07 0 0 1 19.93 9H6.7zM20 19H4v-8h16z"></path><circle cx="6.5" cy="16.5" r="1.5"></circle><circle cx="11.5" cy="13.5" r="1.5"></circle><circle cx="17" cy="16" r="2"></circle></svg></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Dairy Products</h6>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">8</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-home-alt"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Beauty and hygiene</h6>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold"><?php echo $third_category ?></small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-mobile-alt"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Electronic Appliance</h6>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold"><?php echo $fifth_category ?></small>
                            </div>
                          </div>
                        </li>
                        
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"
                              ><i class="bx bx-football"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Others</h6>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold"><?php echo $fourth_category ?></small>
                            </div>
                          </div>
                        </li>
                        

                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-8 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                      <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link active"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-tabs-line-card-income"
                            aria-controls="navs-tabs-line-card-income"
                            aria-selected="true"
                          >
                            Income
                          </button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab">Expenses</button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab">Profit</button>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body px-0">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                          <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                            </div>
                            <div>
                              <small class="text-muted d-block">Total Balance</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">&#8377;459.10</h6>
                                <small class="text-success fw-semibold">
                                  <i class="bx bx-chevron-up"></i>
                                  Profits
                                </small>
                              </div>
                            </div>
                          </div>
                          <div id="incomeChart"></div>
                          <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                              <div id="expensesOfWeek"></div>
                            </div>
                            <div>
                              <a href="">
                              <h2 class="mb-n1 mt-1">Sales Per Day</h2>
                              <small class="text-muted">Click me to reset the graph <br> or drag right to left </small>
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

              
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
                  <a href="" target="_blank" class="footer-link fw-bolder">SXCA Research Team</a>
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




    <!-- Core scripts -->
    <!-- Core JS -->
    <script>

      // sales prediction
      var spAI = document.getElementById('sales-predection');
      random = Math.floor(Math.random() * 4);
      spAI.innerHTML = ' ' + random;
      


      // company growth circular chart
      var sIndex = <?php echo $gross_profit ?>;

      // Days of sales (id = expensesOfWeek) 
      var dIndex =  <?php echo $total_units ?>;;

      // big line graph x axis (6) (id = incomeChart)
      var cIndex = <?php echo json_encode($timestamp) ?>;
      cIndex.unshift("");
      var dataIndex = <?php echo json_encode($units)?>;
      dataIndex.unshift(0);
      //Market Place and Category
      // labels: ['Food-Beverages', 'Healthcare', 'Dairy-Products', 'Electronic Appliance'    , 'Beauty-hygiene']
      var mcIndex = [<?php echo $first_category?>,<?php echo $second_category?>,<?php echo $third_category?>,<?php echo $fourth_category?>,<?php echo $fifth_category?>];

      // Company Growth (id = totalRevenueChart )
      // cgIndex1 = 2021 , cgIndex2 = 2022, 
      // jan feb mar apr may jun jul
      var cgIndex1 = [<?php echo $first_category?>,<?php echo $second_category?>,<?php echo $third_category?>,<?php echo $fourth_category?>];
      // var cgIndex2 = [0, -9, -4, -5, -1, 0, 0];
      var total = [<?php echo $total_product?>];
      //mini line graph (id = profileReportChart)
      random1 = Math.floor(Math.random() * 5);
      random2 = Math.floor(Math.random() * 5);

      var prIndex = [0,random,random1,random2,random2,0];

      
    </script>



    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>