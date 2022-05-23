<?php 
include 'config.php';

if(isset($_GET['id']) && $_GET['id']>0){
    $id = $_GET['id'];

    
   
    // echo $qr_id;
    $sql = mysqli_query($conn,"SELECT * FROM units WHERE qr_code= $id");
	
    
    if(mysqli_num_rows($sql)>0) {
        $row = mysqli_fetch_assoc($sql);
        $qr_code = $row['qr_code'];
        $qr_id = substr($qr_code,0,6);
        $scans = $row['scans'];
        $location = $row['location'];
        $warning = $row['warning'];
        $update_scans = $scans + 1;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://ip-api.com/json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $curl_result = curl_exec($ch);
        curl_close($ch);

        $curl_result = json_decode($curl_result, true);
        $ip = $curl_result['query'];
        $city = $curl_result['city'];
        $region = $curl_result['regionName'];
        $zip = $curl_result['zip'];
        $address = $city.', '.$region.', '.$zip;
        $isp = $curl_result['isp'];
        $today = date("F j, Y, g:i a"); 

        if($scans == 0){
        $sql = mysqli_query($conn,"UPDATE units SET `scans` = '$update_scans',`ip_address` = '$ip',`location`='$address',`isp`='$isp',`timestamp`='$today',`last_location` = '$location' WHERE qr_code = $id");
        header("location: data.php?id=".$qr_code."");    
    }
        else{
            if($address != $location){
                if($warning > 3){
                    $war_sql = mysqli_query($conn,"UPDATE units SET `status` = '0' WHERE qr_code = $id");
                }
                else{
                    $upadte_Warn = $warning + 1;
                    $up_warn = mysqli_query($conn,"UPDATE units SET `warning` = '$upadte_Warn' WHERE qr_code = $id");
                }
            }

            else{
                $sql = mysqli_query($conn,"UPDATE units SET `scans` = '$update_scans',`ip_address` = '$ip',`location`='$address',`isp`='$isp',`timestamp`='$today',`last_location` = '$location' WHERE qr_code = $id");
                header("location: data.php?id=".$qr_code."");
            }
       
    }
    }else {
        die('Something Went Wrong');
    }

    if($_GET['id'] == null || $_GET['id'] == "null")
    {
        echo '<script>alert("Please Scan QR Code");</script>';
    }
   
}

?>