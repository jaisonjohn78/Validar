<?php
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../public/index.php");
  }

error_reporting(0);
$user_id= $_SESSION["user_id"];


    $sql = "SELECT * FROM users WHERE id='" . $_SESSION["user_id"] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    
   
            $max_date=mysqli_query($conn,"SELECT MAX(timestamp) AS timestamp from cart");
            // $date_result = mysqli_query($con,$max_date);
            $date_row=mysqli_fetch_assoc($max_date);
            $max_dates = $date_row['timestamp'];
            
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1,minimum-scale=1">
    <title>Mobile UI</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="assets/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.2.1/html5-qrcode.min.js" integrity="sha512-cuVnjPNH3GyigomLiyATgpCoCmR9T3kwjf94p0BnSfdtHClzr1kyaMHhUmadydjxzi1pwlXjM5sEWy4Cd4WScA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
    
    
    <style>
        .header {
        z-index: 999;
        }
        main {
            position: sticky;
            transform: translate(0%, 10%);
            background: #ffffff00;
            padding-top: 0px !important;

        }
        #qr-reader {
           
            z-index: 99;
            background: #fff;
            /* height: 200px; */
            padding: 5px;
            /* overflow: hidden; */
        }
        #bill {
            position: relative;
            height: 100vh;
            font-size:12.3px;
        }

        /* table, .category-item {
            
            width: 90vw;
            display: table;
            padding: 0px;
            padding-top: 0px !important;
            
        }
        table {
            border-collapse: separate;
            border-spacing: 0 1.2em;
            transform: translate(0%,-6%);
            overflow: hidden;
            border:1px solid gray;
        }
        td i {
            font-size: 1.9em;
            cursor: pointer;
        } */
        #product {
            max-width: 30vw !important;
            overflow: hidden;
            padding-left: 18px;
            text-align: left;
        }
        .section-wrapper {
            padding: 0px !important;
        }
        .qr {
            background-color: rgb(0, 255, 64);
        }


    </style>
</head>
<body style="background-color: #97c8df;">
   
 
        <div class="header">
            <div id="reader" width="80vw"></div>
        </div>
    <main>
        <div class="categories section-wrapper">
            <div class="category-items" id="bill">
                <div class="category-item">
                
                    <h3><?php echo $max_dates ?></h3>
                    <hr style="background-color:#97c8df"/>
                    <table class="table table-striped">
                        <!--Table head-->
                        <thead style="background-color:#34a9e0;color:white">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Total Product</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        <?php
                $user_id= $_SESSION["user_id"];
                $res=mysqli_query($conn,"SELECT product_name,amount,count,price FROM cart WHERE u_id =' $user_id' AND timestamp = (SELECT MAX(timestamp) AS timestamp from cart)");                                    // die();
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                   
            ?>
      <tr>
          <th><?php echo $i++ ?></th>
          <td><?php echo $row['product_name']?></td>
          <td><?php echo $row['price']?></td>
          <td><?php echo $row['count']?></td>
          <td><?php echo $row['amount']?></td>
          
      </tr>
      <?php } ?>
                            
                        </tbody>
                        <!--Table body-->
                    </table>
                 </div>
            </div>
        </div>
        
        
    </main>
    
    
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
                        <span class="las la-user"></span>
                        <p>More</p>
                    </div>
                </div></a>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>
    <script type="text/javascript">
        $("input[type='text']:last-child").focus();
        const html5QrCode = new Html5Qrcode("reader");
        // on success funtion call 
        var sound = new Audio("assets/scanned.mp3");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            sound.play();
            sound.onended = function(){ 
            $.ajax({
            url: "data.php",
            type: 'POST',
            dataType: 'html',
            async: true,
            processData: false,
            cache: false,
            success: function (data) {
                window.location.href = "info.php?id="+decodedText;
                }
            });
        }

        };
        const config = { fps: 15, qrbox: { width: 250, height: 150 } };

        // If you want to prefer front camera
        html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback);

        // If you want to prefer back camera
        html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);

        // Select front camera or fail with `OverconstrainedError`.
        html5QrCode.start({ facingMode: { exact: "user"} }, config, qrCodeSuccessCallback);

        // Select back camera or fail with `OverconstrainedError`.
        html5QrCode.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);

    </script> 


<script type="text/javascript">

var intervalId = window.setInterval(function(){

    $('html, body').animate({scrollTop: '0px'}, 1000);
    $('main').animate({scrollBottom: '0px'}, 3000);

}, 3000);


</script>

</body>
</html>


<!-- <style>
    #preview{
       width:500px;
       height:500px;
       margin:auto;
    }
    </style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR scanner</title>
    </head>
    <body>
        <video id="preview"></video>
        <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
            <label class="btn btn-primary active">
              <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
            </label>
          </div>

    </body>
    </html>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        alert(content);
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script> -->