<?php 
include 'config.php';

if(isset($_GET['id']) && $_GET['id']>0){
    $id = $_GET['id'];
    $sql = mysqli_query($con,"SELECT * FROM product WHERE uid= $id");

    if(mysqli_num_rows($sql)>0) {
        $row = mysqli_fetch_assoc($sql);
        $qr_code = $row['qr_code'];

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
        $sql = mysqli_query($con,"INSERT INTO table () values ()");
        echo "<h1>".$address."</h1>";


        
    }else {
        die('Something Went Wrong');
    }
   
}

?>