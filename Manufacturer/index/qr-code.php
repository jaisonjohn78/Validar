<?php
include('config.php');
// $id = $_SESSION['man_data']->id;
$id = $_GET['id'];
$sql = "SELECT * FROM units WHERE p_id='$id'";
$result = mysqli_query($con, $sql);

$linkcode = substr("", 0, 5);

$unit_sql = "SELECT * FROM units ";
// $row = mysqli_fetch_assoc($result);




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
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
  <style>
    table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
      text-align: center !important;
    }
  </style>
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
                    <div data-i18n="Horizontal Form">QR List</div>
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
                      <table class="table user-table text-center " id="mytable">
                        <thead>
                          <tr>
                            <th class="border-top-0">
                              #
                            </th>
                            <th class="border-top-0">
                              QR Code
                            </th>
                            <th class="border-top-0">
                              QR
                            </th>
                            <th class="border-top-0">
                              ID
                            </th>
                            <th class="border-top-0">
                              Location Scanned
                            </th>
                            <th class="border-top-0">
                              Total Scanned
                            </th>
                          </tr>
                        </thead>

                        <tbody style="text-align:center;">

                        <?php

                            $path = "qrcode.php";
                            $i = 1;
                            if ($result->num_rows > 0) {
                              while($row = mysqli_fetch_array($result))
                              {
                              $code = $row['qr_code'];
                              $id = $row['id'];
                              $status = $row['status'];
                              if($status == 1){
                              echo "<tr><td>".$i."</td><td> <h4>".$code."</h4> <a class='text-success'>Working</a> </td><td><img src='https://chart.apis.google.com/chart?cht=qr&chs=200x200&chco=1ab2ff&chl=".$code."'><br><b><a href='' onclick='print()'>Print</a> || <a href='https://chart.apis.google.com/chart?cht=qr&chs=200x200&chco=1ab2ff&chl=".$code."' target='_blank'>View</a></b></td><td>".$row['id']."</td><td>".$row['location']."</td><td>".$row['scans']."</td></tr>";
                            } if($status == 0){
                              echo "<tr><td>".$i."</td><td> <h4>".$code."</h4> <a class='text-warning'>Sold</a> </td><td><img src='https://chart.apis.google.com/chart?cht=qr&chs=200x200&chco=1ab2ff&chl=".$code."'><br><b><a href=''>No Print</a> || <a href=''>No View</a></b></td><td>".$row['id']."</td><td>".$row['location']."</td><td>".$row['scans']."</td></tr>";
                            } if($status == 2) {
                              echo "<tr><td>".$i."</td><td> <h4>".$code."</h4> <a class='text-warning'>Blocked</a> </td><td><img src='https://chart.apis.google.com/chart?cht=qr&chs=200x200&chco=1ab2ff&chl=".$code."'><br><b><a href=''>No Print</a> || <a href=''>No View</a></b></td><td>".$row['id']."</td><td>".$row['location']."</td><td>".$row['scans']."</td></tr>";
                              
                            }
                            $i++;
                              }
                            } else {
                              echo "<h1>No Products</h1>";
                            }
                        ?>  
                        
                          



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
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>


    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      function delete_link(id) {
        var r = prompt("Are you sure you want to delete product ID: " + id + "? \n\ntype 'CONFIRM' to delete");
        if (r == 'CONFIRM') {
          <?php
            $sql = "DELETE FROM units WHERE `id` = $";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            
            ?>
            alert("Product Deleted");
          return false;
        } else {
          return false;
        }
      }
      let table = new DataTable('#mytable', {
      // options

      });
    </script>
  </body>
</html>
